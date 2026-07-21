<?php

declare(strict_types=1);

namespace App\Modules\Plans\Seeders;

use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use Illuminate\Database\Seeder;

/**
 * Seeds the meal catalog from the public website menu
 * (`lang/{ar,en}/website_menu_page.php` → `js.menu`).
 *
 * Images live at storage/app/public/meals (public disk root folder).
 */
final class MealSeeder extends Seeder
{
    public function run(): void
    {
        if (Meal::query()->exists()) {
            return;
        }

        foreach ($this->meals() as $index => $meal) {
            $model = new Meal;
            $model->meal_type = $meal['type'];
            $model->setTranslations('name', $meal['name']);
            $model->calories = $meal['calories'];
            $model->protein_g = $meal['protein_g'];
            $model->carbs_g = $meal['carbs_g'];
            $model->fat_g = $meal['fat_g'];
            $model->image_path = $meal['image'];
            $model->is_active = true;
            $model->sort_order = $index;
            $model->save();
        }
    }

    /**
     * @return list<array{type: MealType, name: array<string, string>, calories: int, protein_g: int, carbs_g: int, fat_g: int, image: string}>
     */
    private function meals(): array
    {
        return [
            // Breakfast
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'شكشوكة نيومي', 'en' => 'New Me shakshuka'], 'calories' => 320, 'protein_g' => 18, 'carbs_g' => 20, 'fat_g' => 14, 'image' => 'meals/breakfast-01.jpg'],
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'توست الأفوكادو بالبيض', 'en' => 'Avocado egg toast'], 'calories' => 350, 'protein_g' => 21, 'carbs_g' => 28, 'fat_g' => 16, 'image' => 'meals/breakfast-02.jpg'],
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'شوفان التمر والمكسرات', 'en' => 'Date & nut oatmeal'], 'calories' => 380, 'protein_g' => 12, 'carbs_g' => 52, 'fat_g' => 12, 'image' => 'meals/breakfast-03.jpg'],
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'بان كيك البروتين', 'en' => 'Protein pancakes'], 'calories' => 340, 'protein_g' => 24, 'carbs_g' => 38, 'fat_g' => 9, 'image' => 'meals/breakfast-04.jpg'],
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'لبنة وخبز البذور', 'en' => 'Labneh & seed bread'], 'calories' => 310, 'protein_g' => 16, 'carbs_g' => 30, 'fat_g' => 14, 'image' => 'meals/breakfast-05.jpg'],
            ['type' => MealType::Breakfast, 'name' => ['ar' => 'أومليت الخضار', 'en' => 'Veggie omelette'], 'calories' => 300, 'protein_g' => 22, 'carbs_g' => 8, 'fat_g' => 20, 'image' => 'meals/breakfast-06.jpg'],

            // Lunch
            ['type' => MealType::Lunch, 'name' => ['ar' => 'دجاج مشوي مع أرز بني', 'en' => 'Grilled chicken with brown rice'], 'calories' => 520, 'protein_g' => 42, 'carbs_g' => 48, 'fat_g' => 14, 'image' => 'meals/lunch-01.jpg'],
            ['type' => MealType::Lunch, 'name' => ['ar' => 'سلمون بالفرن مع كينوا', 'en' => 'Baked salmon with quinoa'], 'calories' => 560, 'protein_g' => 38, 'carbs_g' => 40, 'fat_g' => 24, 'image' => 'meals/lunch-02.jpg'],
            ['type' => MealType::Lunch, 'name' => ['ar' => 'كبسة الدجاج لايت', 'en' => 'Light chicken kabsa'], 'calories' => 540, 'protein_g' => 35, 'carbs_g' => 58, 'fat_g' => 12, 'image' => 'meals/lunch-03.jpg'],
            ['type' => MealType::Lunch, 'name' => ['ar' => 'برغر نيومي', 'en' => 'New Me burger'], 'calories' => 500, 'protein_g' => 34, 'carbs_g' => 40, 'fat_g' => 18, 'image' => 'meals/lunch-04.jpg'],
            ['type' => MealType::Lunch, 'name' => ['ar' => 'معكرونة القمح الكامل', 'en' => 'Whole-wheat pasta'], 'calories' => 530, 'protein_g' => 36, 'carbs_g' => 55, 'fat_g' => 12, 'image' => 'meals/lunch-05.jpg'],
            ['type' => MealType::Lunch, 'name' => ['ar' => 'سلطة الترمس والكينوا', 'en' => 'Lupin quinoa salad'], 'calories' => 450, 'protein_g' => 32, 'carbs_g' => 38, 'fat_g' => 16, 'image' => 'meals/lunch-06.jpg'],

            // Dinner
            ['type' => MealType::Dinner, 'name' => ['ar' => 'ستيك مع خضار سوتيه', 'en' => 'Steak with sautéed veg'], 'calories' => 480, 'protein_g' => 40, 'carbs_g' => 14, 'fat_g' => 26, 'image' => 'meals/dinner-01.jpg'],
            ['type' => MealType::Dinner, 'name' => ['ar' => 'دجاج تكا بالروب', 'en' => 'Chicken tikka with yogurt'], 'calories' => 430, 'protein_g' => 38, 'carbs_g' => 20, 'fat_g' => 18, 'image' => 'meals/dinner-02.jpg'],
            ['type' => MealType::Dinner, 'name' => ['ar' => 'سمك مشوي وبطاطا حلوة', 'en' => 'Grilled fish & sweet potato'], 'calories' => 450, 'protein_g' => 34, 'carbs_g' => 36, 'fat_g' => 16, 'image' => 'meals/dinner-03.jpg'],
            ['type' => MealType::Dinner, 'name' => ['ar' => 'كرات اللحم بالطماطم', 'en' => 'Meatballs in tomato'], 'calories' => 460, 'protein_g' => 33, 'carbs_g' => 24, 'fat_g' => 22, 'image' => 'meals/dinner-04.jpg'],
            ['type' => MealType::Dinner, 'name' => ['ar' => 'صينية الدجاج بالخضار', 'en' => 'Chicken veggie tray'], 'calories' => 420, 'protein_g' => 36, 'carbs_g' => 22, 'fat_g' => 16, 'image' => 'meals/dinner-05.jpg'],
            ['type' => MealType::Dinner, 'name' => ['ar' => 'شوربة العدس', 'en' => 'Lentil soup'], 'calories' => 380, 'protein_g' => 22, 'carbs_g' => 48, 'fat_g' => 8, 'image' => 'meals/dinner-06.jpg'],

            // Snack
            ['type' => MealType::Snack, 'name' => ['ar' => 'زبادي بالجرانولا', 'en' => 'Yogurt with granola'], 'calories' => 220, 'protein_g' => 14, 'carbs_g' => 22, 'fat_g' => 8, 'image' => 'meals/snack-01.jpg'],
            ['type' => MealType::Snack, 'name' => ['ar' => 'مكسرات وتمر', 'en' => 'Nuts & dates'], 'calories' => 210, 'protein_g' => 6, 'carbs_g' => 20, 'fat_g' => 13, 'image' => 'meals/snack-02.jpg'],
            ['type' => MealType::Snack, 'name' => ['ar' => 'مقرمشات وحمص', 'en' => 'Crackers & hummus'], 'calories' => 190, 'protein_g' => 7, 'carbs_g' => 18, 'fat_g' => 9, 'image' => 'meals/snack-03.jpg'],
            ['type' => MealType::Snack, 'name' => ['ar' => 'كرات الطاقة', 'en' => 'Energy balls'], 'calories' => 180, 'protein_g' => 6, 'carbs_g' => 20, 'fat_g' => 8, 'image' => 'meals/snack-04.jpg'],
            ['type' => MealType::Snack, 'name' => ['ar' => 'بارفيه التوت', 'en' => 'Berry parfait'], 'calories' => 200, 'protein_g' => 12, 'carbs_g' => 24, 'fat_g' => 6, 'image' => 'meals/snack-05.jpg'],
            ['type' => MealType::Snack, 'name' => ['ar' => 'خضار ولبنة', 'en' => 'Veggies & labneh'], 'calories' => 150, 'protein_g' => 8, 'carbs_g' => 12, 'fat_g' => 8, 'image' => 'meals/snack-06.jpg'],
        ];
    }
}
