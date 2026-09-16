<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

/**
 * ITU country calling codes for the store phone field.
 *
 * Dial values are unique so the select can round-trip. Shared codes
 * (for example +1) are labelled as a region, not duplicated.
 *
 * @phpstan-type CallingCode array{dial: string, ar: string, en: string}
 */
final class CountryCallingCodes
{
    public const DEFAULT_DIAL = '966';

    /**
     * @return list<CallingCode>
     */
    public static function all(): array
    {
        return self::codes();
    }

    /**
     * @return list<string>
     */
    public static function dials(): array
    {
        return array_column(self::codes(), 'dial');
    }

    public static function isKnown(string $dial): bool
    {
        return in_array($dial, self::dials(), true);
    }

    /**
     * @return list<CallingCode>
     */
    private static function codes(): array
    {
        return [
            ['dial' => '966', 'ar' => 'السعودية', 'en' => 'Saudi Arabia'],
            ['dial' => '971', 'ar' => 'الإمارات', 'en' => 'United Arab Emirates'],
            ['dial' => '965', 'ar' => 'الكويت', 'en' => 'Kuwait'],
            ['dial' => '974', 'ar' => 'قطر', 'en' => 'Qatar'],
            ['dial' => '973', 'ar' => 'البحرين', 'en' => 'Bahrain'],
            ['dial' => '968', 'ar' => 'عُمان', 'en' => 'Oman'],
            ['dial' => '20', 'ar' => 'مصر', 'en' => 'Egypt'],
            ['dial' => '249', 'ar' => 'السودان', 'en' => 'Sudan'],
            ['dial' => '962', 'ar' => 'الأردن', 'en' => 'Jordan'],
            ['dial' => '967', 'ar' => 'اليمن', 'en' => 'Yemen'],
            ['dial' => '964', 'ar' => 'العراق', 'en' => 'Iraq'],
            ['dial' => '963', 'ar' => 'سوريا', 'en' => 'Syria'],
            ['dial' => '961', 'ar' => 'لبنان', 'en' => 'Lebanon'],
            ['dial' => '970', 'ar' => 'فلسطين', 'en' => 'Palestine'],
            ['dial' => '218', 'ar' => 'ليبيا', 'en' => 'Libya'],
            ['dial' => '216', 'ar' => 'تونس', 'en' => 'Tunisia'],
            ['dial' => '213', 'ar' => 'الجزائر', 'en' => 'Algeria'],
            ['dial' => '212', 'ar' => 'المغرب', 'en' => 'Morocco'],
            ['dial' => '222', 'ar' => 'موريتانيا', 'en' => 'Mauritania'],
            ['dial' => '252', 'ar' => 'الصومال', 'en' => 'Somalia'],
            ['dial' => '253', 'ar' => 'جيبوتي', 'en' => 'Djibouti'],
            ['dial' => '269', 'ar' => 'جزر القمر', 'en' => 'Comoros'],
            ['dial' => '1', 'ar' => 'الولايات المتحدة / كندا', 'en' => 'United States / Canada'],
            ['dial' => '44', 'ar' => 'المملكة المتحدة', 'en' => 'United Kingdom'],
            ['dial' => '33', 'ar' => 'فرنسا', 'en' => 'France'],
            ['dial' => '49', 'ar' => 'ألمانيا', 'en' => 'Germany'],
            ['dial' => '39', 'ar' => 'إيطاليا', 'en' => 'Italy'],
            ['dial' => '34', 'ar' => 'إسبانيا', 'en' => 'Spain'],
            ['dial' => '351', 'ar' => 'البرتغال', 'en' => 'Portugal'],
            ['dial' => '31', 'ar' => 'هولندا', 'en' => 'Netherlands'],
            ['dial' => '32', 'ar' => 'بلجيكا', 'en' => 'Belgium'],
            ['dial' => '41', 'ar' => 'سويسرا', 'en' => 'Switzerland'],
            ['dial' => '43', 'ar' => 'النمسا', 'en' => 'Austria'],
            ['dial' => '46', 'ar' => 'السويد', 'en' => 'Sweden'],
            ['dial' => '47', 'ar' => 'النرويج', 'en' => 'Norway'],
            ['dial' => '45', 'ar' => 'الدنمارك', 'en' => 'Denmark'],
            ['dial' => '358', 'ar' => 'فنلندا', 'en' => 'Finland'],
            ['dial' => '353', 'ar' => 'أيرلندا', 'en' => 'Ireland'],
            ['dial' => '48', 'ar' => 'بولندا', 'en' => 'Poland'],
            ['dial' => '420', 'ar' => 'التشيك', 'en' => 'Czechia'],
            ['dial' => '36', 'ar' => 'المجر', 'en' => 'Hungary'],
            ['dial' => '30', 'ar' => 'اليونان', 'en' => 'Greece'],
            ['dial' => '90', 'ar' => 'تركيا', 'en' => 'Turkey'],
            ['dial' => '7', 'ar' => 'روسيا / كازاخستان', 'en' => 'Russia / Kazakhstan'],
            ['dial' => '380', 'ar' => 'أوكرانيا', 'en' => 'Ukraine'],
            ['dial' => '40', 'ar' => 'رومانيا', 'en' => 'Romania'],
            ['dial' => '359', 'ar' => 'بلغاريا', 'en' => 'Bulgaria'],
            ['dial' => '385', 'ar' => 'كرواتيا', 'en' => 'Croatia'],
            ['dial' => '381', 'ar' => 'صربيا', 'en' => 'Serbia'],
            ['dial' => '386', 'ar' => 'سلوفينيا', 'en' => 'Slovenia'],
            ['dial' => '421', 'ar' => 'سلوفاكيا', 'en' => 'Slovakia'],
            ['dial' => '370', 'ar' => 'ليتوانيا', 'en' => 'Lithuania'],
            ['dial' => '371', 'ar' => 'لاتفيا', 'en' => 'Latvia'],
            ['dial' => '372', 'ar' => 'إستونيا', 'en' => 'Estonia'],
            ['dial' => '352', 'ar' => 'لوكسمبورغ', 'en' => 'Luxembourg'],
            ['dial' => '356', 'ar' => 'مالطا', 'en' => 'Malta'],
            ['dial' => '357', 'ar' => 'قبرص', 'en' => 'Cyprus'],
            ['dial' => '354', 'ar' => 'آيسلندا', 'en' => 'Iceland'],
            ['dial' => '91', 'ar' => 'الهند', 'en' => 'India'],
            ['dial' => '92', 'ar' => 'باكستان', 'en' => 'Pakistan'],
            ['dial' => '880', 'ar' => 'بنغلاديش', 'en' => 'Bangladesh'],
            ['dial' => '94', 'ar' => 'سريلانكا', 'en' => 'Sri Lanka'],
            ['dial' => '977', 'ar' => 'نيبال', 'en' => 'Nepal'],
            ['dial' => '93', 'ar' => 'أفغانستان', 'en' => 'Afghanistan'],
            ['dial' => '98', 'ar' => 'إيران', 'en' => 'Iran'],
            ['dial' => '972', 'ar' => 'إسرائيل', 'en' => 'Israel'],
            ['dial' => '86', 'ar' => 'الصين', 'en' => 'China'],
            ['dial' => '81', 'ar' => 'اليابان', 'en' => 'Japan'],
            ['dial' => '82', 'ar' => 'كوريا الجنوبية', 'en' => 'South Korea'],
            ['dial' => '850', 'ar' => 'كوريا الشمالية', 'en' => 'North Korea'],
            ['dial' => '852', 'ar' => 'هونغ كونغ', 'en' => 'Hong Kong'],
            ['dial' => '853', 'ar' => 'ماكاو', 'en' => 'Macau'],
            ['dial' => '886', 'ar' => 'تايوان', 'en' => 'Taiwan'],
            ['dial' => '65', 'ar' => 'سنغافورة', 'en' => 'Singapore'],
            ['dial' => '60', 'ar' => 'ماليزيا', 'en' => 'Malaysia'],
            ['dial' => '62', 'ar' => 'إندونيسيا', 'en' => 'Indonesia'],
            ['dial' => '66', 'ar' => 'تايلاند', 'en' => 'Thailand'],
            ['dial' => '84', 'ar' => 'فيتنام', 'en' => 'Vietnam'],
            ['dial' => '63', 'ar' => 'الفلبين', 'en' => 'Philippines'],
            ['dial' => '95', 'ar' => 'ميانمار', 'en' => 'Myanmar'],
            ['dial' => '855', 'ar' => 'كمبوديا', 'en' => 'Cambodia'],
            ['dial' => '856', 'ar' => 'لاوس', 'en' => 'Laos'],
            ['dial' => '673', 'ar' => 'بروناي', 'en' => 'Brunei'],
            ['dial' => '61', 'ar' => 'أستراليا', 'en' => 'Australia'],
            ['dial' => '64', 'ar' => 'نيوزيلندا', 'en' => 'New Zealand'],
            ['dial' => '27', 'ar' => 'جنوب أفريقيا', 'en' => 'South Africa'],
            ['dial' => '234', 'ar' => 'نيجيريا', 'en' => 'Nigeria'],
            ['dial' => '254', 'ar' => 'كينيا', 'en' => 'Kenya'],
            ['dial' => '251', 'ar' => 'إثيوبيا', 'en' => 'Ethiopia'],
            ['dial' => '233', 'ar' => 'غانا', 'en' => 'Ghana'],
            ['dial' => '225', 'ar' => 'ساحل العاج', 'en' => 'Ivory Coast'],
            ['dial' => '221', 'ar' => 'السنغال', 'en' => 'Senegal'],
            ['dial' => '237', 'ar' => 'الكاميرون', 'en' => 'Cameroon'],
            ['dial' => '255', 'ar' => 'تنزانيا', 'en' => 'Tanzania'],
            ['dial' => '256', 'ar' => 'أوغندا', 'en' => 'Uganda'],
            ['dial' => '250', 'ar' => 'رواندا', 'en' => 'Rwanda'],
            ['dial' => '257', 'ar' => 'بوروندي', 'en' => 'Burundi'],
            ['dial' => '243', 'ar' => 'الكونغو الديمقراطية', 'en' => 'DR Congo'],
            ['dial' => '242', 'ar' => 'الكونغو', 'en' => 'Congo'],
            ['dial' => '241', 'ar' => 'الغابون', 'en' => 'Gabon'],
            ['dial' => '240', 'ar' => 'غينيا الاستوائية', 'en' => 'Equatorial Guinea'],
            ['dial' => '244', 'ar' => 'أنغولا', 'en' => 'Angola'],
            ['dial' => '258', 'ar' => 'موزمبيق', 'en' => 'Mozambique'],
            ['dial' => '263', 'ar' => 'زيمبابوي', 'en' => 'Zimbabwe'],
            ['dial' => '260', 'ar' => 'زامبيا', 'en' => 'Zambia'],
            ['dial' => '265', 'ar' => 'مالاوي', 'en' => 'Malawi'],
            ['dial' => '267', 'ar' => 'بوتسوانا', 'en' => 'Botswana'],
            ['dial' => '264', 'ar' => 'ناميبيا', 'en' => 'Namibia'],
            ['dial' => '266', 'ar' => 'ليسوتو', 'en' => 'Lesotho'],
            ['dial' => '268', 'ar' => 'إسواتيني', 'en' => 'Eswatini'],
            ['dial' => '261', 'ar' => 'مدغشقر', 'en' => 'Madagascar'],
            ['dial' => '230', 'ar' => 'موريشيوس', 'en' => 'Mauritius'],
            ['dial' => '248', 'ar' => 'سيشل', 'en' => 'Seychelles'],
            ['dial' => '220', 'ar' => 'غامبيا', 'en' => 'Gambia'],
            ['dial' => '224', 'ar' => 'غينيا', 'en' => 'Guinea'],
            ['dial' => '245', 'ar' => 'غينيا بيساو', 'en' => 'Guinea-Bissau'],
            ['dial' => '238', 'ar' => 'الرأس الأخضر', 'en' => 'Cape Verde'],
            ['dial' => '232', 'ar' => 'سيراليون', 'en' => 'Sierra Leone'],
            ['dial' => '231', 'ar' => 'ليبيريا', 'en' => 'Liberia'],
            ['dial' => '228', 'ar' => 'توغو', 'en' => 'Togo'],
            ['dial' => '229', 'ar' => 'بنين', 'en' => 'Benin'],
            ['dial' => '226', 'ar' => 'بوركينا فاسو', 'en' => 'Burkina Faso'],
            ['dial' => '227', 'ar' => 'النيجر', 'en' => 'Niger'],
            ['dial' => '223', 'ar' => 'مالي', 'en' => 'Mali'],
            ['dial' => '235', 'ar' => 'تشاد', 'en' => 'Chad'],
            ['dial' => '236', 'ar' => 'إفريقيا الوسطى', 'en' => 'Central African Republic'],
            ['dial' => '211', 'ar' => 'جنوب السودان', 'en' => 'South Sudan'],
            ['dial' => '291', 'ar' => 'إريتريا', 'en' => 'Eritrea'],
            ['dial' => '55', 'ar' => 'البرازيل', 'en' => 'Brazil'],
            ['dial' => '54', 'ar' => 'الأرجنتين', 'en' => 'Argentina'],
            ['dial' => '52', 'ar' => 'المكسيك', 'en' => 'Mexico'],
            ['dial' => '57', 'ar' => 'كولومبيا', 'en' => 'Colombia'],
            ['dial' => '56', 'ar' => 'تشيلي', 'en' => 'Chile'],
            ['dial' => '51', 'ar' => 'بيرو', 'en' => 'Peru'],
            ['dial' => '58', 'ar' => 'فنزويلا', 'en' => 'Venezuela'],
            ['dial' => '593', 'ar' => 'الإكوادور', 'en' => 'Ecuador'],
            ['dial' => '591', 'ar' => 'بوليفيا', 'en' => 'Bolivia'],
            ['dial' => '595', 'ar' => 'باراغواي', 'en' => 'Paraguay'],
            ['dial' => '598', 'ar' => 'الأوروغواي', 'en' => 'Uruguay'],
            ['dial' => '53', 'ar' => 'كوبا', 'en' => 'Cuba'],
            ['dial' => '507', 'ar' => 'بنما', 'en' => 'Panama'],
            ['dial' => '506', 'ar' => 'كوستاريكا', 'en' => 'Costa Rica'],
            ['dial' => '502', 'ar' => 'غواتيمالا', 'en' => 'Guatemala'],
            ['dial' => '504', 'ar' => 'هندوراس', 'en' => 'Honduras'],
            ['dial' => '503', 'ar' => 'السلفادور', 'en' => 'El Salvador'],
            ['dial' => '505', 'ar' => 'نيكاراغوا', 'en' => 'Nicaragua'],
            ['dial' => '1876', 'ar' => 'جامايكا', 'en' => 'Jamaica'],
            ['dial' => '1809', 'ar' => 'جمهورية الدومينيكان', 'en' => 'Dominican Republic'],
            ['dial' => '1784', 'ar' => 'سانت فنسنت', 'en' => 'Saint Vincent'],
            ['dial' => '1868', 'ar' => 'ترينيداد وتوباغو', 'en' => 'Trinidad and Tobago'],
            ['dial' => '1242', 'ar' => 'الباهاما', 'en' => 'Bahamas'],
            ['dial' => '1246', 'ar' => 'بربادوس', 'en' => 'Barbados'],
            ['dial' => '994', 'ar' => 'أذربيجان', 'en' => 'Azerbaijan'],
            ['dial' => '995', 'ar' => 'جورجيا', 'en' => 'Georgia'],
            ['dial' => '374', 'ar' => 'أرمينيا', 'en' => 'Armenia'],
            ['dial' => '996', 'ar' => 'قيرغيزستان', 'en' => 'Kyrgyzstan'],
            ['dial' => '998', 'ar' => 'أوزبكستان', 'en' => 'Uzbekistan'],
            ['dial' => '992', 'ar' => 'طاجيكستان', 'en' => 'Tajikistan'],
            ['dial' => '993', 'ar' => 'تركمانستان', 'en' => 'Turkmenistan'],
            ['dial' => '976', 'ar' => 'منغوليا', 'en' => 'Mongolia'],
            ['dial' => '975', 'ar' => 'بوتان', 'en' => 'Bhutan'],
            ['dial' => '960', 'ar' => 'المالديف', 'en' => 'Maldives'],
            ['dial' => '355', 'ar' => 'ألبانيا', 'en' => 'Albania'],
            ['dial' => '387', 'ar' => 'البوسنة', 'en' => 'Bosnia and Herzegovina'],
            ['dial' => '382', 'ar' => 'الجبل الأسود', 'en' => 'Montenegro'],
            ['dial' => '389', 'ar' => 'مقدونيا الشمالية', 'en' => 'North Macedonia'],
            ['dial' => '383', 'ar' => 'كوسوفو', 'en' => 'Kosovo'],
            ['dial' => '373', 'ar' => 'مولدوفا', 'en' => 'Moldova'],
            ['dial' => '375', 'ar' => 'بيلاروسيا', 'en' => 'Belarus'],
            ['dial' => '376', 'ar' => 'أندورا', 'en' => 'Andorra'],
            ['dial' => '377', 'ar' => 'موناكو', 'en' => 'Monaco'],
            ['dial' => '378', 'ar' => 'سان مارينو', 'en' => 'San Marino'],
            ['dial' => '423', 'ar' => 'ليختنشتاين', 'en' => 'Liechtenstein'],
            ['dial' => '350', 'ar' => 'جبل طارق', 'en' => 'Gibraltar'],
            ['dial' => '298', 'ar' => 'جزر فارو', 'en' => 'Faroe Islands'],
            ['dial' => '299', 'ar' => 'غرينلاند', 'en' => 'Greenland'],
            ['dial' => '262', 'ar' => 'ريونيون / مايوت', 'en' => 'Réunion / Mayotte'],
            ['dial' => '239', 'ar' => 'ساو تومي وبرينسيبي', 'en' => 'São Tomé and Príncipe'],
            ['dial' => '290', 'ar' => 'سانت هيلينا', 'en' => 'Saint Helena'],
            ['dial' => '501', 'ar' => 'بليز', 'en' => 'Belize'],
            ['dial' => '509', 'ar' => 'هايتي', 'en' => 'Haiti'],
            ['dial' => '592', 'ar' => 'غيانا', 'en' => 'Guyana'],
            ['dial' => '597', 'ar' => 'سورينام', 'en' => 'Suriname'],
            ['dial' => '670', 'ar' => 'تيمور الشرقية', 'en' => 'Timor-Leste'],
            ['dial' => '675', 'ar' => 'بابوا غينيا الجديدة', 'en' => 'Papua New Guinea'],
            ['dial' => '679', 'ar' => 'فيجي', 'en' => 'Fiji'],
        ];
    }
}
