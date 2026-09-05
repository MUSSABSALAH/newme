<?php

declare(strict_types=1);

namespace App\Modules\Cms\Seeders;

use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Seeds website articles & recipes from the previous static lang content.
 */
final class CmsContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->articles() as $index => $article) {
            $model = Article::query()->updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'category' => $article['category'],
                    'title' => $article['title'],
                    'excerpt' => $article['excerpt'],
                    'author' => $article['author'],
                    'read_time' => $article['read_time'],
                    'body_1' => $article['body_1'],
                    'body_2' => $article['body_2'],
                    'highlight' => $article['highlight'],
                    'body_3' => $article['body_3'],
                    'cta_label' => $article['cta_label'],
                    'cta_url' => $article['cta_url'],
                    'image_path' => $this->copyImage($article['image'], 'cms/articles'),
                    'is_active' => true,
                    'sort_order' => $index,
                ],
            );

            // Ensure translations stick when updateOrCreate merges fillable JSON.
            $model->setTranslations('category', $article['category']);
            $model->setTranslations('title', $article['title']);
            $model->setTranslations('excerpt', $article['excerpt']);
            $model->setTranslations('author', $article['author']);
            $model->setTranslations('read_time', $article['read_time']);
            $model->setTranslations('body_1', $article['body_1']);
            $model->setTranslations('body_2', $article['body_2']);
            $model->setTranslations('highlight', $article['highlight']);
            $model->setTranslations('body_3', $article['body_3']);
            $model->setTranslations('cta_label', $article['cta_label']);
            $model->save();
        }

        foreach ($this->recipes() as $index => $recipe) {
            $model = Recipe::query()->updateOrCreate(
                ['slug' => $recipe['slug']],
                [
                    'category' => $recipe['category'],
                    'title' => $recipe['title'],
                    'excerpt' => $recipe['excerpt'],
                    'meta_title' => $recipe['meta_title'],
                    'time_label' => $recipe['time_label'],
                    'kcal_label' => $recipe['kcal_label'],
                    'protein_label' => $recipe['protein_label'],
                    'servings_label' => $recipe['servings_label'],
                    'ingredients' => $recipe['ingredients'],
                    'steps' => $recipe['steps'],
                    'cta_label' => $recipe['cta_label'],
                    'cta_url' => $recipe['cta_url'],
                    'image_path' => $this->copyImage($recipe['image'], 'cms/recipes'),
                    'is_active' => true,
                    'sort_order' => $index,
                ],
            );

            $model->setTranslations('category', $recipe['category']);
            $model->setTranslations('title', $recipe['title']);
            $model->setTranslations('excerpt', $recipe['excerpt']);
            $model->setTranslations('meta_title', $recipe['meta_title']);
            $model->setTranslations('time_label', $recipe['time_label']);
            $model->setTranslations('kcal_label', $recipe['kcal_label']);
            $model->setTranslations('protein_label', $recipe['protein_label']);
            $model->setTranslations('servings_label', $recipe['servings_label']);
            $model->setTranslations('ingredients', $recipe['ingredients']);
            $model->setTranslations('steps', $recipe['steps']);
            $model->setTranslations('cta_label', $recipe['cta_label']);
            $model->save();
        }
    }

    /**
     * Copy a static CMS image from public/assets/images into the public
     * storage disk (and the committed public/storage mirror) so website and
     * admin share the same path.
     */
    private function copyImage(string $filename, string $folder): string
    {
        $target = $folder.'/'.$filename;
        $source = public_path('assets/images/'.$filename);
        if (! is_file($source)) {
            $fallbacks = [
                'p92_1200x640.jpg' => 'v30-article-1.jpg',
                'p93_1200x640.jpg' => 'v30-article-2.jpg',
                'p94_1200x640.jpg' => 'v30-article-3.jpg',
                'p95_1200x640.jpg' => 'v30-recipe-1.jpg',
                'p96_1200x640.jpg' => 'v30-recipe-2.jpg',
                'p97_1200x640.jpg' => 'v30-recipe-3.jpg',
            ];
            if (isset($fallbacks[$filename])) {
                $source = public_path('assets/images/'.$fallbacks[$filename]);
            }
        }

        if (is_file($source)) {
            Storage::disk('public')->put($target, (string) file_get_contents($source));

            // This repo serves uploads from public/storage without relying on a symlink.
            $publicDest = public_path('storage/'.$target);
            File::ensureDirectoryExists(dirname($publicDest));
            File::copy($source, $publicDest);
        }

        return $target;
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function articles(): array
    {
        return [
            [
                'slug' => 'lupin-plant-protein',
                'image' => 'p92_1200x640.jpg',
                'cta_url' => '/store',
                'category' => ['ar' => 'تغذية', 'en' => 'Nutrition'],
                'title' => [
                    'ar' => 'لماذا يُعد الترمس أقوى بروتين نباتي لم تسمع عنه؟',
                    'en' => 'Why lupin is the strongest plant protein you haven’t heard of',
                ],
                'excerpt' => [
                    'ar' => '40% بروتيناً وألياف عالية ومؤشر جلايسيمي منخفض — ماذا يقول العلم عن حبة الترمس؟',
                    'en' => '40% protein, high fiber, and a low glycemic index — what science says about lupin.',
                ],
                'author' => ['ar' => 'د. لمى الشمري', 'en' => 'Dr. Lama Al-Shammari'],
                'read_time' => ['ar' => '4 دقائق قراءة', 'en' => '4 min read'],
                'body_1' => [
                    'ar' => 'حين نفكر في البروتين النباتي يقفز فول الصويا والعدس إلى الذهن، بينما تغيب حبة صغيرة عرفتها موائدنا منذ قرون: الترمس. تصل نسبة البروتين في الترمس الأبيض المقشور إلى نحو 40% من وزنه الجاف — رقم يضعه في صدارة البقوليات، ويجعله منافساً حقيقياً لمساحيق البروتين الصناعية.',
                    'en' => 'When we think of plant protein, soy and lentils come to mind — while a small bean our tables have known for centuries is overlooked: lupin. Protein in peeled white lupin reaches about 40% of its dry weight — a figure that puts it at the top of legumes and makes it a real rival to industrial protein powders.',
                ],
                'body_2' => [
                    'ar' => 'وما يميز الترمس ليس البروتين وحده؛ فهو منخفض الكربوهيدرات بطبيعته وغني بالألياف، ما يمنحه مؤشراً جلايسيمياً منخفضاً ويجعله خياراً ذكياً لمن يراقبون سكر الدم أو يتبعون أنظمة قليلة الكربوهيدرات. كما أن قوامه بعد الطحن يمنح المخبوزات ليونة وشبعاً أعلى دون دقيق أبيض مكرر.',
                    'en' => 'What sets lupin apart isn’t protein alone; it is naturally low in carbs and rich in fiber, giving it a low glycemic index and making it a smart choice for anyone watching blood sugar or following a lower-carb plan. After milling, its texture also adds softness and greater satiety to baked goods — without refined white flour.',
                ],
                'highlight' => [
                    'ar' => 'في مخبز نيومي، يدخل دقيق الترمس في خبزنا اليومي — لهذا تجد قطعة خبز البذور المتعدد تحمل 12.1غ بروتين مقابل 5غ كربوهيدرات صافية فقط.',
                    'en' => 'In the New Me bakery, lupin flour goes into our daily bread — that’s why a piece of multi-seed bread carries 12.1g protein against only 5g net carbs.',
                ],
                'body_3' => [
                    'ar' => 'القاعدة العملية: إن كنت تبحث عن شبعٍ أطول وطاقةٍ أثبت في نصف يومك الأول، فاستبدل خبز الإفطار الأبيض بخيار قائم على الترمس، وراقب الفرق في جوعك قبل الغداء.',
                    'en' => 'The practical rule: if you want longer satiety and steadier energy through the first half of your day, swap white breakfast bread for a lupin-based option and notice the difference in hunger before lunch.',
                ],
                'cta_label' => ['ar' => 'تسوّق منتجات الترمس ←', 'en' => 'Shop lupin products →'],
            ],
            [
                'slug' => 'post-workout-protein',
                'image' => 'p93_1200x640.jpg',
                'cta_url' => '/subscribe#plan=muscle',
                'category' => ['ar' => 'لياقة', 'en' => 'Fitness'],
                'title' => [
                    'ar' => 'كم غرام بروتين تحتاج فعلاً بعد التمرين؟',
                    'en' => 'How many grams of protein do you really need after training?',
                ],
                'excerpt' => [
                    'ar' => 'دليل عملي لحساب احتياجك اليومي حسب وزنك وهدفك — مع أمثلة وجبات جاهزة.',
                    'en' => 'A practical guide to your daily need by weight and goal — with ready meal examples.',
                ],
                'author' => ['ar' => 'أ. عبدالله الحربي', 'en' => 'Abdullah Al-Harbi'],
                'read_time' => ['ar' => '5 دقائق قراءة', 'en' => '5 min read'],
                'body_1' => [
                    'ar' => 'الإجابة المختصرة التي يتفق عليها معظم مختصي تغذية الرياضيين: ما بين 0.3 و0.4 غرام لكل كيلوغرام من وزن جسمك في الوجبة الواحدة بعد التمرين. لشخص وزنه 80 كجم، هذا يعني نحو 25 إلى 32 غراماً — لا أكثر بكثير، فالجسم لا يخزّن فائض البروتين للعضلات.',
                    'en' => 'The short answer most sports nutritionists agree on: about 0.3 to 0.4 grams per kilogram of body weight in the meal after training. For someone weighing 80 kg, that means roughly 25 to 32 grams — not much more, because the body doesn’t store surplus protein for muscle.',
                ],
                'body_2' => [
                    'ar' => 'الأهم من رقم الوجبة الواحدة هو مجموع يومك: الهدف الشائع لبناء العضلات يتراوح بين 1.6 و2.2 غرام لكل كيلوغرام يومياً، موزّعة على 3 إلى 5 وجبات متقاربة الحصص. التوزيع المنتظم يتفوق على وجبة واحدة ضخمة في نهاية اليوم.',
                    'en' => 'More important than a single meal is your daily total: the common muscle-building target ranges from 1.6 to 2.2 grams per kilogram per day, spread across 3 to 5 meals of similar size. Even distribution beats one huge meal at the end of the day.',
                ],
                'highlight' => [
                    'ar' => 'مثال عملي من منتجاتنا: شريحتا توست + بيضتان بعد التمرين ≈ 19غ بروتين. أضف قطعة خبز البذور المتعدد (12.1غ) لتصل إلى نطاقك المستهدف.',
                    'en' => 'A practical example from our products: two toast slices + two eggs after training ≈ 19g protein. Add a multi-seed bread piece (12.1g) to reach your target range.',
                ],
                'body_3' => [
                    'ar' => 'وأخيراً: نافذة «الساعة الذهبية» بعد التمرين أقل صرامة مما يُشاع — المهم أن تصل وجبتك البروتينية خلال ساعتين تقريباً، وأن يكون يومك كله مضبوطاً. هذا بالضبط ما تفعله خطة البروتين+ في اشتراكات نيومي.',
                    'en' => 'Finally: the post-workout “golden hour” is less strict than rumor suggests — what matters is getting your protein meal within about two hours, and keeping the whole day dialed in. That’s exactly what the Protein+ plan does in New Me subscriptions.',
                ],
                'cta_label' => ['ar' => 'اطلع على خطة بناء العضلات ←', 'en' => 'See the muscle-building plan →'],
            ],
            [
                'slug' => 'plant-omega-3-flax',
                'image' => 'p94_1200x640.jpg',
                'cta_url' => '/store',
                'category' => ['ar' => 'نمط حياة', 'en' => 'Lifestyle'],
                'title' => [
                    'ar' => 'أوميغا-3 النباتي: ماذا تفعل ملعقة كتان يومياً لقلبك؟',
                    'en' => 'Plant omega-3: what a daily spoon of flax does for your heart',
                ],
                'excerpt' => [
                    'ar' => 'الفرق بين مصادر الأوميغا، وكيف تدمج بذور الكتان في يومك دون أن تشعر.',
                    'en' => 'The difference between omega sources, and how to fold flax into your day without noticing.',
                ],
                'author' => ['ar' => 'د. ريم الغامدي', 'en' => 'Dr. Reem Al-Ghamdi'],
                'read_time' => ['ar' => '3 دقائق قراءة', 'en' => '3 min read'],
                'body_1' => [
                    'ar' => 'بذور الكتان من أغنى المصادر النباتية بحمض الألفا-لينولينيك (ALA)، وهو الشكل النباتي من أوميغا-3. ملعقة كبيرة واحدة من الكتان المطحون تمنحك ما يقارب 1.8 غرام منه — وهو ما يغطي الاحتياج اليومي المُوصى به لمعظم البالغين.',
                    'en' => 'Flaxseeds are among the richest plant sources of alpha-linolenic acid (ALA), the plant form of omega-3. One tablespoon of ground flax gives you about 1.8 grams — covering the recommended daily need for most adults.',
                ],
                'body_2' => [
                    'ar' => 'تشير مراجعات علمية عديدة إلى ارتباط الاستهلاك المنتظم للكتان بتحسّن مؤشرات صحة القلب، مثل ضغط الدم ومستويات الدهون. ولأن القشرة الصلبة تمنع الامتصاص، القاعدة الأهم: استهلكه مطحوناً — أو مخبوزاً داخل الخبز والمقرمشات.',
                    'en' => 'Many scientific reviews link regular flax intake with better heart-health markers such as blood pressure and lipid levels. Because the hard shell blocks absorption, the key rule: eat it ground — or baked into bread and crackers.',
                ],
                'highlight' => [
                    'ar' => 'لهذا نطحن بذور الكتان طازجة فجر كل يوم وندخلها في مقرمشاتنا وجرانولا البذور — أوميغا-3 تُؤكل، لا تُبتلع كحبوب.',
                    'en' => 'That’s why we grind flaxseeds fresh every dawn and fold them into our crackers and seed granola — omega-3 you eat, not swallow as pills.',
                ],
                'body_3' => [
                    'ar' => 'أسهل ثلاث طرق لإدخاله في يومك: رشّة على اللبن أو الشوفان صباحاً، مقرمشات الكتان كسناك للعصر، أو شريحة خبز بذور مع العشاء. الانتظام أهم من الكمية.',
                    'en' => 'Three easy ways to add it to your day: a sprinkle on yogurt or oats in the morning, flax crackers as an afternoon snack, or a seed-bread slice with dinner. Consistency matters more than quantity.',
                ],
                'cta_label' => ['ar' => 'تسوّق منتجات بذور الكتان ←', 'en' => 'Shop flaxseed products →'],
            ],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function recipes(): array
    {
        return [
            [
                'slug' => 'lupin-avocado-egg-toast',
                'image' => 'p95_1200x640.jpg',
                'cta_url' => '/product',
                'category' => ['ar' => 'إفطار', 'en' => 'Breakfast'],
                'title' => [
                    'ar' => 'توست الترمس بالأفوكادو والبيض',
                    'en' => 'Lupin toast with avocado and egg',
                ],
                'excerpt' => [
                    'ar' => 'إفطار متكامل على شريحة واحدة من خبز الترمس البروتيني.',
                    'en' => 'A complete breakfast on one slice of protein lupin bread.',
                ],
                'meta_title' => [
                    'ar' => 'توست الترمس بالأفوكادو والبيض',
                    'en' => 'Lupin toast with avocado and egg',
                ],
                'time_label' => ['ar' => '15 دقيقة', 'en' => '15 min'],
                'kcal_label' => ['ar' => '320 kcal', 'en' => '320 kcal'],
                'protein_label' => ['ar' => '21غ بروتين', 'en' => '21g protein'],
                'servings_label' => ['ar' => 'حصة واحدة', 'en' => '1 serving'],
                'ingredients' => [
                    'ar' => [
                        'شريحة توست نيومي (أو خبز البذور المتعدد)',
                        'نصف حبة أفوكادو ناضجة',
                        'بيضة واحدة',
                        'ملعقة صغيرة بذور كتان',
                        'عصرة ليمون · ملح · فلفل أسود',
                    ],
                    'en' => [
                        '1 New Me toast slice (or multi-seed bread)',
                        '½ ripe avocado',
                        '1 egg',
                        '1 tsp flaxseeds',
                        'Lemon squeeze · salt · black pepper',
                    ],
                ],
                'steps' => [
                    'ar' => [
                        'حمّص شريحة التوست حتى تتحمّر أطرافها.',
                        'اهرس الأفوكادو مع الليمون والملح وافرده على التوست.',
                        'اسلق البيضة مسلوقاً خفيفاً (6 دقائق) أو اقلها على عين.',
                        'ضع البيضة فوق الأفوكادو ورشّ بذور الكتان والفلفل.',
                        'قدّمه فوراً — إفطار متكامل في أقل من ربع ساعة.',
                    ],
                    'en' => [
                        'Toast the slice until the edges crisp.',
                        'Mash the avocado with lemon and salt and spread it on the toast.',
                        'Soft-boil the egg (6 minutes) or fry it sunny-side up.',
                        'Place the egg on the avocado and sprinkle flaxseeds and pepper.',
                        'Serve right away — a complete breakfast in under 15 minutes.',
                    ],
                ],
                'cta_label' => ['ar' => 'اطلب خبز البذور المتعدد ←', 'en' => 'Order multi-seed bread →'],
            ],
            [
                'slug' => 'granola-yogurt-parfait',
                'image' => 'p96_1200x640.jpg',
                'cta_url' => '/store',
                'category' => ['ar' => 'سناك', 'en' => 'Snack'],
                'title' => [
                    'ar' => 'بارفيه الجرانولا واللبن بالتوت',
                    'en' => 'Granola yogurt parfait with berries',
                ],
                'excerpt' => [
                    'ar' => 'طبقات جرانولا الكتان والعسل مع لبن يوناني وتوت طازج.',
                    'en' => 'Layers of flax granola and honey with Greek yogurt and fresh berries.',
                ],
                'meta_title' => [
                    'ar' => 'بارفيه الجرانولا واللبن بالتوت',
                    'en' => 'Granola yogurt parfait with berries',
                ],
                'time_label' => ['ar' => '10 دقائق', 'en' => '10 min'],
                'kcal_label' => ['ar' => '280 kcal', 'en' => '280 kcal'],
                'protein_label' => ['ar' => '14غ بروتين', 'en' => '14g protein'],
                'servings_label' => ['ar' => 'حصة واحدة', 'en' => '1 serving'],
                'ingredients' => [
                    'ar' => [
                        'نصف كوب جرانولا البذور من نيومي',
                        'كوب لبن يوناني',
                        'حفنة توت طازج (أو فراولة)',
                        'ملعقة صغيرة عسل',
                    ],
                    'en' => [
                        '½ cup New Me seed granola',
                        '1 cup Greek yogurt',
                        'A handful of fresh berries (or strawberries)',
                        '1 tsp honey',
                    ],
                ],
                'steps' => [
                    'ar' => [
                        'في كوب زجاجي، ضع طبقة لبن ثم طبقة جرانولا.',
                        'أضف طبقة توت، وكرر الطبقات حتى يمتلئ الكوب.',
                        'اختم بحبات التوت ورشّة الجرانولا وخيط العسل.',
                        'قدّمه بارداً — سناك عصر مثالي قبل التمرين.',
                    ],
                    'en' => [
                        'In a glass cup, add a yogurt layer then a granola layer.',
                        'Add a berry layer and repeat until the cup is full.',
                        'Finish with berries, a sprinkle of granola, and a drizzle of honey.',
                        'Serve cold — a perfect afternoon snack before training.',
                    ],
                ],
                'cta_label' => ['ar' => 'اطلب جرانولا البذور ←', 'en' => 'Order seed granola →'],
            ],
            [
                'slug' => 'lupin-quinoa-lemon-salad',
                'image' => 'p97_1200x640.jpg',
                'cta_url' => '/store',
                'category' => ['ar' => 'غداء', 'en' => 'Lunch'],
                'title' => [
                    'ar' => 'سلطة الترمس والكينوا بالليمون',
                    'en' => 'Lupin quinoa salad with lemon',
                ],
                'excerpt' => [
                    'ar' => 'غداء خفيف مشبع يجمع بروتين الترمس مع انتعاش الليمون.',
                    'en' => 'A light, filling lunch pairing lupin protein with bright lemon.',
                ],
                'meta_title' => [
                    'ar' => 'سلطة الترمس والكينوا بالليمون',
                    'en' => 'Lupin quinoa salad with lemon',
                ],
                'time_label' => ['ar' => '20 دقيقة', 'en' => '20 min'],
                'kcal_label' => ['ar' => '410 kcal', 'en' => '410 kcal'],
                'protein_label' => ['ar' => '24غ بروتين', 'en' => '24g protein'],
                'servings_label' => ['ar' => 'حصتان', 'en' => '2 servings'],
                'ingredients' => [
                    'ar' => [
                        'كوب ترمس مقشّر جاهز',
                        'نصف كوب كينوا مطبوخة',
                        'خيار · طماطم كرزية · بقدونس',
                        'عصير ليمونة + ملعقتان زيت زيتون',
                        'ملح · كمون',
                    ],
                    'en' => [
                        '1 cup ready peeled lupin',
                        '½ cup cooked quinoa',
                        'Cucumber · cherry tomatoes · parsley',
                        'Juice of 1 lemon + 2 tbsp olive oil',
                        'Salt · cumin',
                    ],
                ],
                'steps' => [
                    'ar' => [
                        'اطبخ الكينوا واتركها تبرد قليلاً.',
                        'قطّع الخضار وأضفها للترمس والكينوا في وعاء واسع.',
                        'اخفق الليمون مع الزيت والملح والكمون وأسكبه فوقها.',
                        'قلّب وقدّمها مع مقرمشات الزعتر — غداء خفيف مشبع.',
                    ],
                    'en' => [
                        'Cook the quinoa and let it cool slightly.',
                        'Chop the vegetables and add them to the lupin and quinoa in a wide bowl.',
                        'Whisk lemon with oil, salt, and cumin and pour over.',
                        'Toss and serve with zaatar crackers — a light, filling lunch.',
                    ],
                ],
                'cta_label' => ['ar' => 'تسوّق المكونات من نيومي ←', 'en' => 'Shop ingredients from New Me →'],
            ],
        ];
    }
}
