<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class AddressMapLookupTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_a_pin_inside_riyadh_fills_the_address(): void
    {
        Http::fake([
            'nominatim.openstreetmap.org/*' => Http::response([
                'address' => [
                    'road' => 'King Fahd Road',
                    'house_number' => '12',
                    'neighbourhood' => 'Al Olaya',
                    'city' => 'Riyadh',
                    'state' => 'Riyadh Region',
                    'country_code' => 'sa',
                ],
            ], 200),
        ]);

        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->getJson(route('website.account.addresses.lookup', [
                'lat' => 24.7136,
                'lng' => 46.6753,
            ]))
            ->assertOk()
            ->assertJson([
                'allowed' => true,
                'city' => 'Riyadh',
                'district' => 'Al Olaya',
                'street' => 'King Fahd Road 12',
                'national_address' => '',
            ]);
    }

    public function test_a_pin_inside_riyadh_fills_the_national_address(): void
    {
        config(['services.saudi_address.key' => 'test-key']);

        Http::fake([
            'nominatim.openstreetmap.org/*' => Http::response([
                'address' => [
                    'city' => 'Riyadh',
                    'country_code' => 'sa',
                ],
            ], 200),
            'apina.address.gov.sa/*' => Http::response([
                'success' => true,
                'Addresses' => [[
                    'ShortAddress' => 'RRRD2929',
                    'BuildingNumber' => '8228',
                    'Street' => 'King Fahd Road,طريق الملك فهد',
                    'District' => 'Al Olaya Dist.,العليا',
                    'City' => 'RIYADH,الرياض',
                    'PostCode' => '12211',
                    'AdditionalNumber' => '2121',
                ]],
            ], 200),
        ]);

        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->getJson(route('website.account.addresses.lookup', [
                'lat' => 24.7136,
                'lng' => 46.6753,
            ]))
            ->assertOk()
            ->assertJson([
                'allowed' => true,
                'city' => 'Riyadh',
                'district' => 'Al Olaya',
                'street' => 'King Fahd Road 8228',
                'national_address' => 'RRRD2929',
            ]);
    }

    public function test_a_riyadh_district_without_city_name_is_allowed(): void
    {
        Http::fake([
            'nominatim.openstreetmap.org/*' => Http::response([
                'address' => [
                    'road' => 'رقم 87',
                    'suburb' => 'الياسمين',
                    'municipality' => 'بلدية الشمال',
                    'province' => 'محافظة الرياض',
                    'state' => 'منطقة الرياض',
                    'country_code' => 'sa',
                ],
            ], 200),
        ]);

        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->getJson(route('website.account.addresses.lookup', [
                'lat' => 24.830,
                'lng' => 46.640,
            ]))
            ->assertOk()
            ->assertJson([
                'allowed' => true,
                'city' => 'Riyadh',
                'district' => 'الياسمين',
                'street' => 'رقم 87',
            ]);
    }

    public function test_a_pin_outside_riyadh_is_rejected(): void
    {
        Http::fake([
            'nominatim.openstreetmap.org/*' => Http::response([
                'address' => [
                    'city' => 'Jeddah',
                    'state' => 'Makkah Region',
                    'country_code' => 'sa',
                ],
            ], 200),
        ]);

        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->getJson(route('website.account.addresses.lookup', [
                'lat' => 21.5433,
                'lng' => 39.1728,
            ]))
            ->assertOk()
            ->assertJson([
                'allowed' => false,
                'message' => __('addresses.errors.outside_riyadh'),
            ]);
    }

    public function test_checkout_rejects_an_address_outside_riyadh(): void
    {
        $customer = User::factory()->customer()->create();
        $address = Address::factory()->for($customer)->create(['city' => 'Jeddah']);
        $product = Product::factory()->create(['is_active' => true, 'price' => 2500]);

        $this->actingAs($customer)
            ->withSession(['store_cart' => [$product->id => 1]])
            ->post(route('website.checkout.store'), $this->placeOrderPayload($address, [
                'payment_method' => PaymentMethod::CashOnDelivery->value,
                'card_number' => null,
                'card_holder' => null,
                'card_expiry_month' => null,
                'card_expiry_year' => null,
                'card_cvv' => null,
            ]))
            ->assertSessionHasErrors('address');

        $this->assertSame(0, Order::query()->count());
    }
}
