# وثيقة متطلبات الأعمال والنظام (BRD/SRS)
## لوحة إدارة New Me Forever — Laravel Service Architecture

**اسم المشروع:** New Me Admin & Operations Platform  
**نوع الوثيقة:** Business Requirements Document + System Requirements Specification  
**الإصدار:** 1.0  
**تاريخ الإعداد:** 16 يوليو 2026  
**الحالة:** جاهزة للتقسيم والتنفيذ عبر Cursor  
**اللغات:** العربية والإنجليزية  
**المنطقة الزمنية:** Asia/Riyadh  
**العملة:** SAR

---

# 1. الملخص التنفيذي

المطلوب بناء لوحة تحكم مركزية لإدارة متجر المنتجات الغذائية، خطط واشتراكات الوجبات، التجهيز اليومي، التوصيل، المدفوعات والفواتير، حجوزات الاستشارات، العملاء وملفاتهم الغذائية، الخصومات، المحتوى، التقييمات، المستخدمين والصلاحيات والتقارير.

الشرط المعماري الأساسي هو وجود **Business Logic موحد ومركزي** يخدم Web وAPI من دون تكرار. يمنع وضع منطق الأعمال داخل Web Controllers أو API Controllers أو Blade/Livewire/Inertia Components أو API Resources أو Form Requests أو Jobs/Listeners أو Model Observers.

الـController يستقبل الطلب، يحول البيانات إلى DTO، يستدعي Service، ثم يحول النتيجة إلى Web Response أو API Response. الـService هي نقطة تنفيذ حالة الاستخدام، وتدير القواعد، الحسابات، المعاملات، تغييرات الحالات، المخزون، المدفوعات، الجدولة والأحداث.

---

# 2. خلفية المشروع

النظام المطلوب يدعم ثلاثة أنشطة رئيسية مترابطة:

1. متجر بمنتجات وتصنيفات ومخزون وطلبات.
2. خطط غذائية قابلة للتخصيص حسب عدد الأطباق وأيام التوصيل والمدة والحالة الغذائية.
3. حجوزات استشارات مع جداول أخصائيين ومواعيد وتذكيرات.

الموقع الحالي يعرض خططاً غذائية متعددة، تخصيص عدد الأطباق وأيام التوصيل والمدة، أداة مساعدة لاختيار الخطة، متجر منتجات، حجز مواعيد، محتوى ثنائي اللغة، شركاء توصيل، تقييمات ونموذج تواصل.

اللوحة الجديدة ليست CRUD فقط. المطلوب نظام عمليات يدير الدورة الكاملة من التسعير والدفع حتى التحضير والتوصيل والتجديد والإيقاف والتعويض والاسترجاع والتقارير.

---

# 3. أهداف المشروع

## 3.1 أهداف الأعمال

- توفير مصدر واحد للبيانات والعمليات.
- تمكين الإدارة من التحكم في الموقع دون تعديل الكود.
- إدارة الطلبات والاشتراكات والمواعيد من منصة واحدة.
- تقليل الأخطاء التشغيلية في التسعير والتجهيز والتوصيل.
- توفير رؤية مالية وتشغيلية واضحة.
- دعم التوسع إلى تطبيق جوال أو Frontend منفصل.

## 3.2 أهداف التقنية

- توحيد منطق الأعمال بين Web وAPI.
- منع تكرار قواعد التسعير والحالات والاشتراكات.
- جعل التكاملات الخارجية قابلة للاستبدال عبر Contracts.
- استخدام Transactions للعمليات متعددة الجداول.
- استخدام Queues للأعمال الثقيلة والجانبية.
- توفير اختبارات للقواعد الحرجة والتزامن.
- توفير Audit trail لكل عملية حساسة.

## 3.3 مؤشرات النجاح

- لا يوجد Business Logic داخل Controllers.
- كل عملية تغيير مهمة تمر عبر Service واحدة واضحة.
- نتائج التسعير متطابقة بين الويب والـAPI والفاتورة.
- لا يمكن تكرار تنفيذ Webhook أو Payment callback.
- لا يمكن بيع نفس المخزون مرتين بالتزامن.
- لا يمكن حجز نفس الموعد مرتين.
- لا يمكن تسليم يوم اشتراك مرتين.
- يمكن معرفة حالة كل طلب واشتراك ودفعة وتوصيل.
- يمكن استخراج قائمة تجهيز وتوصيل يومية.
- كل تغيير مالي أو تشغيلي حساس مسجل باسم المستخدم والوقت.

---

# 4. نطاق المشروع

## 4.1 داخل النطاق

- لوحة إدارة Web.
- Admin API V1.
- Public/Customer API عند الحاجة.
- المنتجات والتصنيفات والصور والـVariants.
- المخزون والحجوزات والحركات.
- الطلبات والتسعير والضرائب والخصومات.
- المدفوعات والفواتير والاسترجاعات.
- الخطط وإصدارات الأسعار.
- الاشتراكات وأيام الاشتراك والتجميد والتعويض.
- الوجبات والقوائم وعمليات المطبخ.
- التوصيل والمناطق والفترات والسائقين.
- العملاء والعناوين والملفات الغذائية.
- المواعيد والاستشارات.
- CMS عربي وإنجليزي.
- التقييمات ورسائل التواصل.
- الإشعارات والقوالب.
- المستخدمون والأدوار والصلاحيات.
- Audit logs.
- التقارير والتصدير.
- الإعدادات العامة.
- الاختبارات وتوثيق API.

## 4.2 خارج النطاق في الإصدار الأول

- نظام محاسبي كامل General Ledger.
- إدارة الرواتب.
- إدارة مشتريات وموردين كاملة.
- Multi-tenant SaaS.
- Microservices مستقلة.
- ذكاء اصطناعي طبي أو تشخيص صحي.
- ربط مباشر بكل تطبيقات التوصيل دون APIs واتفاقيات.
- تطبيق سائق متكامل إلا إذا تم اعتماده لاحقاً.
- تكلفة تصنيع ووصفات محاسبية كاملة.

## 4.3 إضافات مستقبلية

- تطبيق جوال للعميل.
- تطبيق أو PWA للسائق.
- Loyalty وWallet وReferral.
- Multi-warehouse.
- تكامل ERP/Odoo.
- إدارة الموردين والمشتريات.
- BI خارجي.
- WhatsApp ordering.

---

# 5. الافتراضات والقرارات الأساسية

1. النظام Single Company في الإصدار الأول.
2. العملة الأساسية SAR.
3. المبالغ تخزن بالهللات كأعداد صحيحة، وليس Float.
4. نسبة الضريبة وقواعدها إعدادات وليست Constants داخل الكود.
5. كل طلب أو اشتراك يحتفظ بـSnapshot من السعر والضريبة والخصم وقت الشراء.
6. بيانات Master Data تستخدم Soft Delete أو Archive.
7. الطلبات والمدفوعات والفواتير لا تحذف نهائياً من الواجهة.
8. التوقيت التقني يخزن UTC، والعرض والحساب التشغيلي بتوقيت الرياض.
9. تواريخ التوصيل Date محلي في الرياض.
10. العربية والإنجليزية مدعومتان من البداية.
11. الحقول الأساسية ثنائية اللغة تستخدم أعمدة صريحة مثل `name_ar` و`name_en`.
12. Laravel Sanctum هو الافتراضي للـAPI ما لم توجد حاجة OAuth2.
13. واجهة الإدارة يمكن أن تكون Blade/Livewire أو Inertia، دون منطق أعمال داخل المكونات.
14. التكاملات الخارجية خلف Contracts/Interfaces.
15. كل Webhook يجب أن يكون signature-verified وIdempotent.
16. كل عملية متعددة الجداول تنفذ داخل Transaction في الـService.
17. الـService لا ترجع JsonResponse أو RedirectResponse أو View.
18. الـService لا تعتمد على HTTP Request أو Session أو Route helpers.
19. Web وAPI يستدعيان نفس Service methods.
20. القواعد الصحية تشغيلية وتوصيات وليست تشخيصاً طبياً.

---

# 6. أصحاب المصلحة

| الجهة | المسؤولية |
|---|---|
| مالك النشاط | اعتماد النطاق والسياسات والأسعار |
| مدير العمليات | الطلبات والاشتراكات والتوصيل |
| مدير المتجر | المنتجات والتصنيفات والمخزون |
| أخصائي التغذية | الخطط والملفات الغذائية والسعرات |
| المطبخ | التجهيز والكميات والملصقات |
| خدمة العملاء | العملاء والتعديلات والشكاوى |
| المحاسب | المدفوعات والفواتير والاسترجاعات |
| مسؤول المحتوى | الصفحات والمقالات والبنرات |
| مسؤول النظام | المستخدمون والصلاحيات والإعدادات |
| المطور | التنفيذ والصيانة والتكاملات |
| العميل | الطلب والاشتراك والحجز والمتابعة |
| السائق | استلام وتسليم الطلبات عند تفعيل الدور |

---

# 7. الأدوار والصلاحيات

## 7.1 الأدوار المقترحة

- Super Admin
- Operations Manager
- Store Manager
- Inventory Officer
- Order Officer
- Subscription Officer
- Nutritionist
- Kitchen Staff
- Delivery Coordinator
- Driver
- Accountant
- Customer Support
- Appointment Officer
- Content Editor
- Report Viewer

## 7.2 نموذج الصلاحيات

أمثلة:

```text
products.view
products.create
products.update
products.archive
products.export
inventory.adjust
orders.view
orders.update_status
orders.cancel
payments.refund
subscriptions.pause
subscriptions.compensate_day
subscriptions.change_plan
health_profiles.view
health_profiles.update
appointments.manage
content.publish
reports.finance
users.manage
settings.manage
```

## 7.3 قواعد الصلاحيات

- كل Route خلف Authentication وAuthorization.
- قراءة البيانات الصحية لها صلاحية منفصلة.
- Refund له صلاحية مستقلة ويمكن وضع سقف مالي حسب الدور.
- الـPolicies هي المصدر الأساسي لصلاحيات الموارد.
- الـServices تعيد التحقق من القواعد الحساسة، حتى بعد Policy.
- Super Admin لا يتجاوز Audit trail.
- Export البيانات الحساسة له صلاحية ويسجل في Audit.

---

# 8. المعمارية المطلوبة

## 8.1 النمط المعماري

المشروع **Modular Monolith** باستخدام Laravel، مع Service Layer مركزية.

```text
HTTP Request
    |
    v
Route + Middleware
    |
    v
Form Request: validation + basic authorization
    |
    v
Web Controller OR API Controller
    |
    v
DTO
    |
    v
Application/Use-Case Service
    |
    +--> Domain Rules / Calculators / State Transitions
    +--> Repositories or Eloquent
    +--> External Gateway Contracts
    +--> DB Transaction
    +--> Domain Events
    |
    v
Result DTO / Entity / Paginator
    |
    +--> Web: View or Redirect
    +--> API: Resource or JSON
```

## 8.2 مسؤوليات الطبقات

### Controllers

مسموح:

- استقبال Form Request.
- استخدام validated data.
- تحويل البيانات إلى DTO.
- استدعاء Service واحدة لحالة الاستخدام.
- إرجاع View/Redirect/API Resource.
- تحديد HTTP status.

ممنوع:

- `DB::transaction`.
- حساب السعر أو الضريبة.
- تغيير المخزون.
- تغيير الحالات مباشرة.
- إنشاء Invoice أو Refund.
- استدعاء Payment Gateway.
- تحديث عدة Models لتنفيذ Use Case.
- إرسال Notification مباشرة.
- كتابة Queries معقدة.
- معالجة Pause/Freeze/Compensation.

### Form Requests

مسؤولة عن:

- Required fields.
- Types and formats.
- Basic relational existence.
- Basic authorization.

غير مسؤولة عن:

- توفر المخزون النهائي.
- صلاحية انتقال الحالة.
- حساب السعر.
- Cutoff.
- تضارب الموعد النهائي.
- أهلية الخطة.
- أي قاعدة تحتاج Lock أو Transaction.

### Services

مسؤولة عن:

- Use cases.
- Business rules.
- Transactions.
- State transitions.
- Pricing.
- Inventory reservations.
- Subscription scheduling.
- Payment orchestration.
- Appointment locking.
- إطلاق Events.
- التكاملات عبر Contracts.
- إعادة نتائج مستقلة عن HTTP.

### Models

مسؤولة عن العلاقات وCasts وScopes البسيطة وخصائص البيانات. لا تحتوي تدفقات أعمال طويلة أو تكاملات خارجية.

### Repositories

ليست إلزامية لكل Model. تستخدم للـQueries المعقدة المتكررة، Locking، مصادر خارجية، أو حدود Core حساسة.

### DTOs

- Typed وImmutable قدر الإمكان.
- لا تعتمد على Request.
- تحتوي بيانات العملية فقط.

### API Resources

- تنسيق JSON فقط.
- لا تحسب مبالغ أو أهلية أو حالات.

### Events/Listeners

- الـService تطلق Event بعد نجاح العملية.
- الإشعارات والمهام غير الحرجة Queued.
- الأحداث المالية تطلق بعد Commit.
- Listener لا يكرر قرار الأعمال الأساسي.

### Jobs

- Export وImport.
- Notifications.
- Webhook retries.
- Schedule generation.
- Expiry reminders.
- Report generation.
- Sync خارجي.

الـJob يستدعي Service ولا يعيد تنفيذ المنطق.

## 8.3 الهيكل المقترح

```text
app/
├── Domain/
│   ├── Catalog/
│   │   ├── Contracts/
│   │   ├── DTOs/
│   │   ├── Enums/
│   │   ├── Events/
│   │   ├── Exceptions/
│   │   ├── Models/
│   │   ├── Policies/
│   │   ├── Queries/
│   │   ├── Repositories/
│   │   ├── Rules/
│   │   └── Services/
│   ├── Inventory/
│   ├── Orders/
│   ├── Subscriptions/
│   ├── Meals/
│   ├── Delivery/
│   ├── Customers/
│   ├── Payments/
│   ├── Appointments/
│   ├── Promotions/
│   ├── Content/
│   ├── Reviews/
│   ├── Notifications/
│   ├── Reports/
│   └── Identity/
├── Http/
│   ├── Controllers/Admin/Web/
│   ├── Controllers/Api/V1/
│   ├── Requests/Admin/
│   ├── Requests/Api/V1/
│   └── Resources/V1/
├── Integrations/
│   ├── Payments/
│   ├── Sms/
│   ├── WhatsApp/
│   ├── Delivery/
│   └── Storage/
├── Jobs/
├── Listeners/
├── Notifications/
├── Providers/
└── Support/
    ├── DTOs/
    ├── Enums/
    ├── Exceptions/
    ├── Money/
    ├── Pagination/
    └── Results/
```

يمكن استخدام `app/Modules` بدلاً من `app/Domain`. المهم ثبات الحدود.

## 8.4 الخدمات المركزية

- ProductService / CategoryService
- InventoryService
- OrderService / OrderPricingService / OrderStatusService
- PlanService / PlanPricingService
- SubscriptionService / SubscriptionScheduleService / SubscriptionChangeService
- MealService / MenuService / KitchenOperationService
- DeliveryService
- CustomerService / HealthProfileService
- AppointmentService
- PromotionService
- PaymentService / RefundService / InvoiceService
- CmsService
- ReviewService / ContactMessageService
- NotificationService
- ReportService
- UserAccessService / SettingsService / AuditService

إذا كبرت الخدمة تقسم حسب Use Case، مثل:

```text
Orders/Services/
├── CreateOrderService.php
├── PriceOrderService.php
├── ConfirmOrderService.php
├── CancelOrderService.php
├── FulfillOrderService.php
└── RefundOrderService.php
```

## 8.5 نتائج الخدمات والأخطاء

الخدمات ترجع Model/Aggregate أو DTO أو Collection أو Paginator أو Result typed object. لا ترجع HTTP response.

أخطاء الأعمال تكون Exceptions واضحة:

```text
InsufficientStockException
InvalidOrderTransitionException
SubscriptionCutoffPassedException
AppointmentSlotUnavailableException
DuplicatePaymentWebhookException
CouponNotApplicableException
RefundAmountExceededException
```

Exception Handler يحولها إلى Web flash أو API error code وHTTP status مناسب.

## 8.6 مثال توحيد Web وAPI

```php
final class StoreProductController
{
    public function __construct(private CreateProductService $service) {}

    public function __invoke(StoreProductRequest $request): RedirectResponse
    {
        $product = $this->service->handle(
            ProductData::fromArray($request->validated()),
            $request->user()
        );

        return redirect()->route('admin.products.show', $product)
            ->with('success', __('Product created successfully.'));
    }
}
```

```php
final class StoreProductApiController
{
    public function __construct(private CreateProductService $service) {}

    public function __invoke(StoreProductRequest $request): ProductResource
    {
        $product = $this->service->handle(
            ProductData::fromArray($request->validated()),
            $request->user()
        );

        return new ProductResource($product);
    }
}
```

المنطق موجود مرة واحدة داخل `CreateProductService`.

---
# 9. المتطلبات الوظيفية

# 9.1 لوحة المؤشرات Dashboard

## المتطلبات

- **FR-DASH-001:** مبيعات اليوم والشهر والفترة المحددة.
- **FR-DASH-002:** عدد الطلبات حسب الحالة.
- **FR-DASH-003:** الاشتراكات النشطة والقريبة من الانتهاء.
- **FR-DASH-004:** مواعيد اليوم والأسبوع.
- **FR-DASH-005:** المدفوعات الفاشلة أو المعلقة.
- **FR-DASH-006:** المنتجات منخفضة المخزون.
- **FR-DASH-007:** التوصيلات اليومية وحالتها.
- **FR-DASH-008:** الرسائل والتقييمات المعلقة.
- **FR-DASH-009:** فلاتر تاريخ موحدة.
- **FR-DASH-010:** إخفاء البطاقات حسب الصلاحية.

## قواعد الأعمال ومعايير القبول

- البيانات المالية لا تظهر دون صلاحية.
- تستخدم Queries مخصصة وCache مناسب، وليس تحميل علاقات كاملة.
- الضغط على أي بطاقة يفتح قائمة مفلترة بنفس التعريف.
- تعريف كل KPI مطابق للتقرير الرسمي المرتبط به.

---

# 9.2 التصنيفات والمنتجات

## التصنيفات

- **FR-CAT-001:** إنشاء تصنيف رئيسي أو فرعي.
- **FR-CAT-002:** الاسم والوصف بالعربية والإنجليزية.
- **FR-CAT-003:** صورة وأيقونة وترتيب.
- **FR-CAT-004:** تفعيل وتعطيل.
- **FR-CAT-005:** منع حذف تصنيف مرتبط بمنتجات نشطة قبل النقل أو الأرشفة.
- **FR-CAT-006:** SEO لكل تصنيف.
- **FR-CAT-007:** شجرة تصنيفات بعمق افتراضي مستويين وقابل للإعداد.

## المنتجات

- **FR-PRD-001:** إنشاء وتعديل ونسخ وأرشفة منتج.
- **FR-PRD-002:** اسم ووصف مختصر وكامل باللغتين.
- **FR-PRD-003:** SKU فريد.
- **FR-PRD-004:** Slug لكل لغة عند الحاجة.
- **FR-PRD-005:** صورة رئيسية ومعرض صور.
- **FR-PRD-006:** ربط بتصنيف أو أكثر.
- **FR-PRD-007:** سعر أساسي وسعر تخفيض وفترة التخفيض.
- **FR-PRD-008:** Tax class.
- **FR-PRD-009:** الوزن والحجم والوحدة.
- **FR-PRD-010:** السعرات والبروتين والكربوهيدرات والدهون.
- **FR-PRD-011:** المكونات ومسببات الحساسية.
- **FR-PRD-012:** تعليمات الحفظ ومدة الصلاحية.
- **FR-PRD-013:** Variants للحجم أو النكهة أو غيرها.
- **FR-PRD-014:** منتج مميز وترتيب العرض.
- **FR-PRD-015:** منتجات مرتبطة.
- **FR-PRD-016:** استيراد وتصدير.
- **FR-PRD-017:** سجل تغييرات السعر.
- **FR-PRD-018:** منع سعر سالب.
- **FR-PRD-019:** منع نشر منتج ناقص الحد الأدنى من البيانات.
- **FR-PRD-020:** SEO وOpen Graph.

## قواعد الأعمال

- سعر الطلب Snapshot ولا يتغير بتعديل المنتج لاحقاً.
- المنتج المعطل لا يقبل طلباً جديداً.
- Variant له SKU وسعر ومخزون مستقل عند تفعيله.
- منتج ظهر في طلب لا يحذف نهائياً.
- التخفيض لا يعمل خارج الفترة.
- أولوية السعر: Variant ثم التخفيض الفعال ثم السعر الأساسي.
- القيم الغذائية تحدد هل هي للحصة أم لكل 100g.

## معايير القبول

- لا يمكن تكرار SKU.
- لا يمكن بيع Variant غير متاح.
- تعديل السعر لا يغير طلباً سابقاً.
- الاستيراد يعرض نتيجة كل صف وأسباب الفشل.
- المنتج يظهر بالعربية والإنجليزية دون خلط حقول.

---

# 9.3 المخزون

## المتطلبات

- **FR-INV-001:** رصيد لكل منتج/Variant.
- **FR-INV-002:** حركات إدخال وإخراج وتسوية وتلف وإرجاع وحجز وفك حجز.
- **FR-INV-003:** حد تنبيه منخفض.
- **FR-INV-004:** منع المخزون السالب حسب السياسة.
- **FR-INV-005:** حفظ السبب والمستخدم والمرجع.
- **FR-INV-006:** حجز مخزون للطلبات غير المكتملة لمدة محددة.
- **FR-INV-007:** فك الحجز عند انتهاء المهلة أو فشل الدفع.
- **FR-INV-008:** الخصم النهائي عند المرحلة المعتمدة في السياسة.
- **FR-INV-009:** تقارير الرصيد والحركات.
- **FR-INV-010:** مخزن واحد في MVP مع قابلية التوسع.

## قواعد الأعمال

- كل تعديل يمر عبر `InventoryService`.
- يمنع تعديل `stock_quantity` مباشرة.
- الحجز والخصم يستخدمان Row locking عند الحاجة.
- حركة المخزون لا تحذف؛ تصحح بحركة عكسية.
- الإلغاء يفك الحجز أو يعيد المخزون حسب المرحلة.

## معايير القبول

- طلبان متزامنان لا يبيعان آخر قطعة مرتين.
- انتهاء مهلة الدفع يعيد الكمية المتاحة.
- كل تغير قابل للتتبع.
- التسوية تحتاج صلاحية وتظهر في Audit.

---

# 9.4 العملاء والملفات الغذائية

## المتطلبات

- **FR-CUS-001:** إنشاء عميل من التسجيل أو يدوياً.
- **FR-CUS-002:** الاسم والجوال والبريد والجنس وتاريخ الميلاد.
- **FR-CUS-003:** عناوين متعددة وعنوان افتراضي.
- **FR-CUS-004:** سجل الطلبات والاشتراكات والمواعيد والمدفوعات.
- **FR-CUS-005:** ملاحظات داخلية.
- **FR-CUS-006:** Tags/Segments.
- **FR-CUS-007:** تعطيل الحساب.
- **FR-CUS-008:** دمج الحسابات المكررة بصلاحية خاصة.
- **FR-CUS-009:** تصدير حسب الفلاتر.
- **FR-CUS-010:** موافقات التواصل التسويقي.
- **FR-CUS-011:** ملف غذائي للطول والوزن والهدف والنشاط والحساسية والتفضيلات.
- **FR-CUS-012:** حالات تشغيلية مثل السكري والحمل والرضاعة.
- **FR-CUS-013:** سجل تغير الوزن والقياسات.
- **FR-CUS-014:** صلاحية منفصلة للبيانات الصحية.
- **FR-CUS-015:** سجل مشاهدة وتعديل البيانات الحساسة.

## قواعد الأعمال ومعايير القبول

- توحيد الجوال بصيغة دولية.
- الحساب المعطل لا يدخل، وسجلاته تبقى.
- البيانات الصحية لا تظهر في exports العامة.
- Customer 360 يعرض كل العلاقات المصرح بها.
- دمج الحسابات ينقل العلاقات ولا يمحو السجل المالي.
- كل تعديل صحي يسجل المستخدم والوقت.

---

# 9.5 الخطط والتسعير

## المتطلبات

- **FR-PLN-001:** إنشاء خطة باللغتين.
- **FR-PLN-002:** وصف وصورة ومميزات.
- **FR-PLN-003:** نوع الهدف الغذائي.
- **FR-PLN-004:** عدد الأطباق المتاح يومياً.
- **FR-PLN-005:** الحد الأدنى لأيام التوصيل أسبوعياً.
- **FR-PLN-006:** مدد بالأيام أو الأسابيع.
- **FR-PLN-007:** Pricing matrix حسب الخطة والأطباق والمدة والأيام.
- **FR-PLN-008:** خصومات المدة.
- **FR-PLN-009:** رسوم أو مجانية التوصيل.
- **FR-PLN-010:** سعرات وMacros افتراضية.
- **FR-PLN-011:** أهلية الخطة وحالات المراجعة.
- **FR-PLN-012:** تفعيل وتعطيل.
- **FR-PLN-013:** ترتيب العرض.
- **FR-PLN-014:** Version لكل تغيير سعري مؤثر.
- **FR-PLN-015:** معاينة السعر قبل النشر.
- **FR-PLN-016:** حد أدنى وأقصى للسعرات.
- **FR-PLN-017:** قواعد توصية الخطة.

## خدمة التسعير

`PlanPricingService` هي المصدر الوحيد للحقيقة.

### المدخلات

- Plan وPlan Version.
- Dishes per day.
- Selected weekdays.
- Duration.
- Start date.
- Delivery zone.
- Coupon.
- Customer eligibility.
- Tax settings.

### المخرجات

- Base subtotal.
- Duration discount.
- Coupon discount.
- Delivery fee.
- Taxable amount.
- Tax amount.
- Grand total.
- Daily price.
- Price breakdown.
- Applied pricing version.

## قواعد الأعمال

- Frontend يرسل الاختيارات فقط، وليس الإجمالي.
- Backend يعيد الحساب دائماً.
- الاشتراك يحفظ Price snapshot وVersion.
- تعديل Matrix لا يغير اشتراكاً قائماً.
- Coupon لا يطبق مرتين.
- التقريب المالي مركزي.

## معايير القبول

- نفس المدخلات تعطي نفس السعر في Web وAPI.
- التلاعب بالسعر من المتصفح لا يؤثر.
- الاشتراك القديم يحتفظ بسعره.
- الخطة غير النشطة لا تقبل اشتراكاً جديداً.

---

# 9.6 الاستبيان والتوصية الغذائية

## المتطلبات

- **FR-REC-001:** إدارة الأسئلة والترتيب والتفعيل.
- **FR-REC-002:** أنواع إجابات متعددة.
- **FR-REC-003:** حفظ جلسة الاستبيان.
- **FR-REC-004:** قواعد توصية قابلة للإعداد.
- **FR-REC-005:** حساب سعرات وMacros عبر Service.
- **FR-REC-006:** تحويل بعض الحالات إلى مراجعة مختص.
- **FR-REC-007:** حفظ Rule Version مع النتيجة.
- **FR-REC-008:** تعديل المختص للنتيجة مع السبب.
- **FR-REC-009:** عدم عرض النتيجة كتشخيص طبي.

## قواعد ومعايير القبول

- الحسابات Server-side.
- المدخلات غير المنطقية ترفض.
- نفس المدخلات ونفس النسخة تعطي نفس النتيجة.
- تحفظ المدخلات والنتيجة والنسخة.
- التعديل اليدوي يحتاج صلاحية ويسجل السبب.

---

# 9.7 الاشتراكات

## المتطلبات

- **FR-SUB-001:** إنشاء اشتراك من Checkout أو الإدارة.
- **FR-SUB-002:** ربط العميل والخطة وPricing Version.
- **FR-SUB-003:** تاريخ بداية ونهاية محسوب.
- **FR-SUB-004:** أيام الأسبوع المختارة.
- **FR-SUB-005:** عدد الأطباق يومياً.
- **FR-SUB-006:** السعرات والMacros.
- **FR-SUB-007:** التفضيلات والحساسية والاستبعادات.
- **FR-SUB-008:** إنشاء أيام الاشتراك Persisted.
- **FR-SUB-009:** Pause وResume.
- **FR-SUB-010:** Freeze لفترة.
- **FR-SUB-011:** Skip day.
- **FR-SUB-012:** Compensate day.
- **FR-SUB-013:** تغيير العنوان أو الوقت.
- **FR-SUB-014:** تغيير الخطة.
- **FR-SUB-015:** تغيير عدد الأطباق.
- **FR-SUB-016:** تعديل السعرات بواسطة مختص.
- **FR-SUB-017:** تمديد وتجديد.
- **FR-SUB-018:** إلغاء مع سبب.
- **FR-SUB-019:** حساب الأيام المتبقية.
- **FR-SUB-020:** Timeline لكل التغييرات.
- **FR-SUB-021:** إشعار قرب الانتهاء.
- **FR-SUB-022:** Cutoff وOverride.
- **FR-SUB-023:** Calendar للاشتراك.
- **FR-SUB-024:** تعويض حسب سبب عدم التسليم.
- **FR-SUB-025:** فرق مالي عند Upgrade/Downgrade.

## حالات الاشتراك

```text
draft
pending_payment
pending_review
scheduled
active
paused
frozen
completed
cancelled
expired
```

## حالات يوم الاشتراك

```text
scheduled
menu_pending
confirmed
in_preparation
ready
out_for_delivery
delivered
skipped_by_customer
skipped_by_company
failed_delivery
cancelled
compensated
```

## قواعد الأعمال

- لا يصبح Active قبل شروط الدفع والمراجعة.
- `SubscriptionScheduleService` تنشئ الأيام الفعلية.
- يوم الاشتراك Entity مستقل.
- Pause/Freeze لا يحذف الأيام؛ يعيد جدولتها حسب السياسة.
- التغيير بعد Cutoff يطبق على أول يوم مؤهل.
- Delivered لا يعدل.
- Compensation يرتبط باليوم الأصلي ويمنع التكرار.
- كل تغيير مؤثر يسجل في `subscription_changes`.
- Renewal ينشئ اشتراكاً جديداً مرتبطاً بالأصلي.
- الأيام المتبقية تعتمد على الأيام القابلة للتسليم، لا فرق التاريخ فقط.
- الإلغاء المالي منفصل ويطبق Refund policy.

## معايير القبول

- اختيار أيام محددة ينشئ التواريخ الصحيحة.
- Pause يعيد الجدولة وفق السياسة.
- Skip بعد Cutoff يرفض دون Override.
- كل تعديل يظهر في Timeline.
- لا يمكن تسليم اليوم مرتين.
- الاشتراك المنتهي لا يقبل أيام توصيل جديدة.

---

# 9.8 الوجبات والقوائم

## المتطلبات

- **FR-MEA-001:** إنشاء وجبة باللغتين.
- **FR-MEA-002:** نوع الوجبة.
- **FR-MEA-003:** صورة ومكونات.
- **FR-MEA-004:** السعرات والMacros.
- **FR-MEA-005:** مسببات الحساسية.
- **FR-MEA-006:** ربط بخطط مناسبة.
- **FR-MEA-007:** بدائل الوجبة.
- **FR-MEA-008:** الطاقة الإنتاجية اليومية.
- **FR-MEA-009:** تفعيل وتعطيل.
- **FR-MEA-010:** Menu يومي أو أسبوعي.
- **FR-MEA-011:** تعيين تلقائي أو يدوي لأيام الاشتراك.
- **FR-MEA-012:** منع تعارض الحساسية.
- **FR-MEA-013:** استبدال قبل Cutoff.
- **FR-MEA-014:** Kitchen list.
- **FR-MEA-015:** Labels.

## قواعد ومعايير القبول

- Meal ليست Product متجر بالضرورة.
- مطابقة الحساسية في Service.
- الوجبة المعطلة لا تستخدم في أيام جديدة.
- الأيام السابقة تحتفظ Snapshot عند الحاجة.
- لا تعين وجبة تحتوي Allergen للعميل.
- قائمة المطبخ تجمع الكميات بدقة.
- يمكن تفسير سبب عدم أهلية وجبة.

---

# 9.9 عمليات المطبخ

- **FR-KIT-001:** شاشة إنتاج حسب التاريخ.
- **FR-KIT-002:** إجمالي الكميات لكل وجبة.
- **FR-KIT-003:** تفاصيل الاستثناءات اللازمة.
- **FR-KIT-004:** حالات Pending/In Preparation/Ready.
- **FR-KIT-005:** Bulk status update.
- **FR-KIT-006:** ملصق عميل وخطة وتاريخ وحساسية.
- **FR-KIT-007:** إعادة طباعة مسجلة.
- **FR-KIT-008:** تقرير فروقات الإنتاج.
- **FR-KIT-009:** إخفاء البيانات الصحية غير اللازمة.
- **FR-KIT-010:** Cutoff لقائمة الإنتاج.

القائمة تعتمد على Subscription Days المؤكدة. التغييرات بعد إغلاق الإنتاج تحتاج Override. كل Label له Identifier. إجمالي التجهيز يجب أن يساوي تفاصيل الأيام.

---

# 9.10 طلبات المتجر

## المتطلبات

- **FR-ORD-001:** إنشاء طلب من الموقع أو الإدارة أو API.
- **FR-ORD-002:** عناصر وكميات وSnapshots.
- **FR-ORD-003:** عنوان ووقت التوصيل.
- **FR-ORD-004:** حساب الضريبة والخصم والتوصيل.
- **FR-ORD-005:** Coupon.
- **FR-ORD-006:** حجز المخزون.
- **FR-ORD-007:** طريقة الدفع.
- **FR-ORD-008:** تغيير حالة مضبوط.
- **FR-ORD-009:** ملاحظات عميل وداخلية.
- **FR-ORD-010:** طباعة Order sheet.
- **FR-ORD-011:** فاتورة.
- **FR-ORD-012:** إلغاء كامل أو جزئي حسب السياسة.
- **FR-ORD-013:** Refund كامل أو جزئي.
- **FR-ORD-014:** Timeline.
- **FR-ORD-015:** تعيين توصيل.
- **FR-ORD-016:** إشعارات.
- **FR-ORD-017:** بحث وفلترة وتصدير.
- **FR-ORD-018:** طلب يدوي للعميل.
- **FR-ORD-019:** منع تعديل العناصر بعد مرحلة محددة إلا Adjustment رسمي.

## الحالات

```text
draft
pending_payment
paid
confirmed
in_preparation
ready
out_for_delivery
delivered
cancelled
partially_refunded
refunded
payment_failed
```

## قواعد الأعمال

- الانتقال عبر State Transition Service، وليس Dropdown حر.
- Delivered لا يرجع إلى Confirmed.
- الإلغاء بعد بدء التحضير يخضع للسياسة.
- `OrderPricingService` تحسب كل Totals.
- الخصم والقيم النهائية لا تؤخذ من Frontend.
- كل Payment callback يعالج مرة واحدة.
- الإلغاء يعالج المخزون والدفع حسب المرحلة.

## معايير القبول

- لا يقبل النظام كمية أكبر من المتاحة.
- كل حالة تعرض الإجراءات القانونية فقط.
- Web وAPI يعطيان نفس الإجمالي.
- Refund جزئي لا يتجاوز المبلغ المتاح.

---

# 9.11 المدفوعات والفواتير والاسترجاعات

## المتطلبات

- **FR-PAY-001:** أكثر من Provider عبر Contract.
- **FR-PAY-002:** Payment attempt.
- **FR-PAY-003:** Provider reference.
- **FR-PAY-004:** Return URL وWebhook.
- **FR-PAY-005:** Idempotency.
- **FR-PAY-006:** حالات الدفع.
- **FR-PAY-007:** إعادة المحاولة.
- **FR-PAY-008:** Refund كامل وجزئي.
- **FR-PAY-009:** Logs منقحة من الأسرار.
- **FR-PAY-010:** Reconciliation.
- **FR-PAY-011:** فاتورة ضريبية.
- **FR-PAY-012:** Credit note عند الحاجة.
- **FR-PAY-013:** إرسال الفاتورة.
- **FR-PAY-014:** منع تخزين بيانات البطاقة.
- **FR-PAY-015:** فصل Payment status عن Order status.

## الحالات

```text
initiated
pending
authorized
captured
failed
cancelled
partially_refunded
refunded
```

## قواعد ومعايير القبول

- كل Provider ينفذ `PaymentGatewayContract`.
- Webhook يتحقق من التوقيع.
- Provider event ID أو Idempotency key فريد.
- Return URL وحده ليس دليلاً على الدفع.
- نجاح الدفع يطلق Event بعد Commit.
- Refund يحتاج صلاحية وسبباً.
- مجموع Refunds لا يتجاوز Captured amount.
- إعادة نفس Webhook لا تنشئ دفعة ثانية.
- فشل Notification لا يعكس عملية دفع ناجحة.

---
# 9.12 التوصيل والمناطق

## المتطلبات

- **FR-DEL-001:** المدن والمناطق.
- **FR-DEL-002:** رسوم وحد أدنى لكل منطقة.
- **FR-DEL-003:** Slots والطاقة الاستيعابية.
- **FR-DEL-004:** أيام الإغلاق والإجازات.
- **FR-DEL-005:** التحقق من التغطية.
- **FR-DEL-006:** Delivery لكل طلب أو يوم اشتراك.
- **FR-DEL-007:** تعيين سائق أو Provider.
- **FR-DEL-008:** Route/Batch يومي.
- **FR-DEL-009:** حالات التوصيل.
- **FR-DEL-010:** إثبات التسليم.
- **FR-DEL-011:** سبب فشل التسليم.
- **FR-DEL-012:** إعادة الجدولة.
- **FR-DEL-013:** تصدير قائمة السائق.
- **FR-DEL-014:** تحديث العميل.
- **FR-DEL-015:** إدارة روابط شركاء التوصيل.

## الحالات

```text
scheduled
assigned
picked_up
out_for_delivery
delivered
failed
rescheduled
cancelled
```

## قواعد الأعمال

- Delivery سجل مستقل عن Order/Subscription Day.
- نجاح التوصيل يحدث المصدر عبر Service orchestration.
- فشل توصيل اشتراك قد ينشئ Compensation وفق السبب والسياسة.
- إثبات التسليم قد يكون OTP أو صورة أو توقيع أو ملاحظة.
- لا يتجاوز Slot طاقته دون Override.
- رسوم المنطقة تدخل في Pricing Service.

## معايير القبول

- استخراج كل توصيلات اليوم.
- رفض عنوان خارج التغطية.
- فشل التوصيل يحتاج سبباً.
- Delivered يحتاج إثباتاً إذا كان الإعداد مفعلاً.
- حالة المصدر وDelivery تبقيان متسقتين.

---

# 9.13 المواعيد والاستشارات

## المتطلبات

- **FR-APT-001:** أنواع الخدمات.
- **FR-APT-002:** المدة والسعر والموقع/Online.
- **FR-APT-003:** أخصائيون وجداول عمل.
- **FR-APT-004:** إجازات وأوقات غير متاحة.
- **FR-APT-005:** توليد Slots.
- **FR-APT-006:** حجز عميل أو إدارة.
- **FR-APT-007:** دفع اختياري أو إلزامي.
- **FR-APT-008:** تأكيد وإلغاء وإعادة جدولة.
- **FR-APT-009:** تذكيرات.
- **FR-APT-010:** رابط اجتماع.
- **FR-APT-011:** ملاحظات المختص.
- **FR-APT-012:** No show.
- **FR-APT-013:** ربط بالعميل والاشتراك.
- **FR-APT-014:** منع Double booking.
- **FR-APT-015:** سياسة إلغاء وRefund.
- **FR-APT-016:** Calendar view.

## الحالات

```text
pending
pending_payment
confirmed
completed
cancelled
no_show
rescheduled
```

## قواعد ومعايير القبول

- الحجز داخل Transaction مع Lock.
- Slot المعروض يعاد التحقق منه عند التأكيد.
- لا يحجز الأخصائي وقتين متداخلين.
- إعادة الجدولة تحفظ الموعد السابق في Timeline.
- التذكيرات Queue.
- طلبان متزامنان لا يحجزان نفس Slot.
- الموعد المكتمل لا يحذف.

---

# 9.14 الخصومات والكوبونات

- **FR-PRO-001:** كود فريد.
- **FR-PRO-002:** نسبة أو مبلغ ثابت.
- **FR-PRO-003:** فترة صلاحية.
- **FR-PRO-004:** حد أدنى.
- **FR-PRO-005:** حد استخدام كلي ولكل عميل.
- **FR-PRO-006:** منتجات أو تصنيفات أو خطط محددة.
- **FR-PRO-007:** أول طلب فقط.
- **FR-PRO-008:** عملاء أو Segments محددة.
- **FR-PRO-009:** خصم توصيل.
- **FR-PRO-010:** تفعيل وتعطيل.
- **FR-PRO-011:** Redemption log.
- **FR-PRO-012:** أولوية وقابلية الجمع.
- **FR-PRO-013:** سقف أقصى للخصم.

التحقق النهائي Server-side. لا يسمح بتجاوز حد الاستخدام بسبب التزامن. فشل أو إلغاء الدفع يعيد الاستخدام حسب السياسة. `PromotionService` تعيد Error codes واضحة لأسباب الرفض.

---

# 9.15 المحتوى CMS

- **FR-CMS-001:** Sections الصفحة الرئيسية.
- **FR-CMS-002:** البنرات والأزرار والصور.
- **FR-CMS-003:** من نحن والقصة والرؤية والرسالة.
- **FR-CMS-004:** الشروط والخصوصية والاسترجاع والتوصيل.
- **FR-CMS-005:** الفوتر والتواصل.
- **FR-CMS-006:** شركاء التوصيل.
- **FR-CMS-007:** روابط التطبيقات.
- **FR-CMS-008:** المقالات والتصنيفات والكتاب.
- **FR-CMS-009:** Draft/Review/Published/Archived.
- **FR-CMS-010:** جدولة النشر.
- **FR-CMS-011:** SEO وOG.
- **FR-CMS-012:** Preview بالعربية والإنجليزية.
- **FR-CMS-013:** Media library.
- **FR-CMS-014:** ترتيب Sections.
- **FR-CMS-015:** Revision history.
- **FR-CMS-016:** منع نشر محتوى ناقص.

المحرر لا يملك النشر تلقائياً إلا بصلاحية. الصفحات القانونية تحتفظ بالنسخ. الصور تفحص. يمنع Script غير موثوق. تعديل المحتوى ينعكس دون Deploy.

---

# 9.16 التقييمات ورسائل التواصل

## التقييمات

- استقبال تقييم وربطه بعميل وطلب عند توفرهما.
- حالات Pending/Approved/Rejected/Hidden.
- رد الإدارة.
- Featured وVerified purchase.
- Spam filtering.
- متوسط التقييم من Approved فقط.

## التواصل

- الاسم والجوال والبريد والشركة والموضوع والرسالة.
- حالات New/In Progress/Replied/Closed/Spam.
- تعيين لموظف.
- ملاحظات داخلية وسجل ردود.
- SLA اختياري وتصدير.

`Verified purchase` لا يحدد من Frontend. بيانات الاتصال لا تظهر للعامة. التقييم المرفوض لا يظهر. الرسائل الجديدة تظهر في Dashboard.

---

# 9.17 الإشعارات والقوالب

## القنوات

- Email
- SMS
- WhatsApp
- In-app
- Push مستقبلاً

## الأحداث

إنشاء حساب، تأكيد طلب، نجاح/فشل الدفع، تغير الحالة، خروج للتوصيل، التسليم، تأكيد الاشتراك، قرب الانتهاء، Pause/Resume، تعديل يوم أو عنوان، تأكيد/تذكير/إلغاء الموعد، Refund، إعادة تعيين كلمة المرور.

## المتطلبات

- قوالب باللغتين.
- Variables موثقة.
- Preview وTest send.
- تفعيل قناة لكل Event.
- سجل إرسال وRetry.
- Provider abstraction.
- منع تكرار الإرسال لنفس Event.
- فصل الإشعارات التشغيلية عن التسويقية.
- احترام Consent للتسويق.

---

# 9.18 المستخدمون وسجل التدقيق

## المتطلبات

- إدارة المستخدمين والأدوار والصلاحيات.
- دعوة وتعطيل وإعادة تعيين كلمة المرور.
- 2FA موصى به للإدارة.
- إدارة Sessions.
- سجل Login.
- Audit log مع فلاتر.
- Before/After للحقول المسموحة.
- إخفاء كلمات المرور والتوكنات والبيانات الحساسة.

## أحداث Audit الإلزامية

- تغير سعر أو مخزون.
- تغير حالة طلب أو اشتراك.
- Refund.
- تعديل بيانات صحية.
- تغيير صلاحيات.
- تعديل إعدادات الدفع.
- نشر محتوى.
- Override للـCutoff.
- Export حساس.
- فشل تسجيل الدخول المتكرر.

---

# 9.19 التقارير

## المبيعات

- حسب اليوم/الأسبوع/الشهر.
- المنتجات والتصنيفات.
- الإجمالي قبل الضريبة والخصم والتوصيل.
- الضريبة وRefunds وصافي الإيراد.

## الاشتراكات

- جديدة ونشطة ومتوقفة ومنتهية.
- Renewal rate وCancellation rate.
- أسباب الإلغاء.
- متوسط قيمة الاشتراك.
- الأيام المسلمة والمتخطاة والمعوضة.
- الخطط الأكثر اختياراً.

## العمليات

- إنتاج المطبخ اليومي.
- عدد الوجبات والاستثناءات.
- التوصيلات حسب المنطقة والسائق.
- Failed deliveries.

## العملاء والمخزون

- العملاء الجدد والمتكررون والأعلى شراءً.
- الرصيد الحالي وLow stock والحركات والتالف.

## قواعد التقارير

- لكل تقرير تعريف Fields واضح.
- الفلاتر Server-side.
- Export الكبير Queue.
- الملفات المؤقتة تنتهي.
- التقارير المالية بصلاحية.
- Money formatter مركزي.

---

# 9.20 الإعدادات العامة

- بيانات الشركة والرقم الضريبي والشعار.
- العملة والمنطقة الزمنية.
- الضريبة وTax classes والتقريب.
- Cutoff ومهلة حجز المخزون والدفع.
- سياسات الإلغاء والاسترجاع.
- Pause/Freeze/Compensation.
- المدن والمناطق والـSlots.
- إعدادات الإشعارات والـProviders.
- SEO ورفع الملفات.
- Feature flags.

الإعدادات الحساسة تخزن مشفرة ولا تعرض كاملة.

---

# 10. تدفقات العمل الأساسية

# 10.1 إنشاء طلب متجر

1. العميل يحدد IDs والكميات.
2. `CreateOrderService` يتحقق من العميل والعنوان والمنطقة.
3. `OrderPricingService` يجلب الأسعار الفعلية.
4. `PromotionService` يتحقق من الكوبون.
5. `InventoryService` يتحقق ويحجز.
6. ينشأ Order وItems وTotals داخل Transaction.
7. ينشأ Payment Attempt.
8. يعود Checkout URL.
9. Webhook يؤكد الدفع.
10. `ConfirmPaymentService` تحدث Payment Idempotently.
11. يطلق `PaymentCaptured` بعد Commit.
12. يؤكد الطلب وتنفذ الإشعارات بالـQueue.

# 10.2 إنشاء اشتراك

1. العميل يختار الخطة والأطباق والأيام والمدة.
2. يرسل الاختيارات، وليس السعر.
3. يتحقق النظام من الملف الغذائي.
4. `PlanPricingService` تحسب السعر.
5. يحفظ Quote قصير الصلاحية.
6. عند التأكيد يعاد التحقق من Quote.
7. ينشأ Subscription بحالة مناسبة.
8. تتم الدفعة.
9. إن احتاج مراجعة يبقى Pending Review.
10. بعد الاعتماد تنشئ `SubscriptionScheduleService` الأيام.
11. يصبح Scheduled أو Active.
12. ترسل الإشعارات.

# 10.3 Pause/Freeze

1. تحديد الفترة والسبب.
2. التحقق من الحالة والصلاحية وCutoff.
3. Lock للأيام المتأثرة.
4. تغيير حالاتها وإعادة الجدولة حسب السياسة.
5. تحديث تاريخ النهاية.
6. تسجيل Subscription Change.
7. إطلاق Event وإشعار العميل.

# 10.4 تعويض يوم

1. تحديد اليوم الأصلي والسبب.
2. منع التعويض المكرر.
3. اختيار أول تاريخ مؤهل.
4. إنشاء يوم جديد مرتبط بالأصلي.
5. تسجيل المستخدم والسبب.
6. إرسال إشعار.

# 10.5 حجز موعد

1. Query Service تعرض Slots المتاحة مبدئياً.
2. العميل يختار Slot.
3. `BookAppointmentService` تبدأ Transaction.
4. تعيد فحص التعارض مع Lock.
5. تنشئ الموعد.
6. تنشئ دفعاً إن كان مطلوباً.
7. تؤكد بعد الدفع.
8. تجدول التذكيرات.

# 10.6 Refund

1. الموظف يحدد العملية والمبلغ والسبب.
2. Policy تتحقق من الصلاحية.
3. `RefundService` تتحقق من الرصيد القابل للاسترجاع.
4. تنشئ Refund record.
5. تستدعي Provider.
6. تعالج النتيجة Idempotently.
7. تحدث Payment والمصدر حسب السياسة.
8. تنشئ Credit note عند الحاجة.
9. تسجل Audit وترسل إشعاراً.

---

# 11. نموذج البيانات المقترح

## الهوية والصلاحيات

`users`, `roles`, `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions`, `login_activities`, `audit_logs`.

## العملاء

`customers`, `customer_addresses`, `customer_preferences`, `customer_health_profiles`, `customer_measurements`, `customer_consents`, `customer_notes`, `customer_tags`, `customer_tag_assignments`.

## المنتجات والمخزون

`categories`, `products`, `product_variants`, `product_images`, `product_categories`, `allergens`, `product_allergens`, `product_price_histories`, `related_products`, `warehouses`, `stock_items`, `stock_movements`, `stock_reservations`, `stock_adjustments`.

## الطلبات

`orders`, `order_items`, `order_addresses`, `order_totals`, `order_status_histories`, `order_notes`, `order_adjustments`.

## الخطط والتوصيات

`plans`, `plan_versions`, `plan_dish_options`, `plan_duration_options`, `plan_pricing_rules`, `plan_eligibility_rules`, `nutrition_questionnaires`, `nutrition_questions`, `nutrition_question_options`, `nutrition_assessments`, `nutrition_recommendations`.

## الاشتراكات

`subscriptions`, `subscription_days`, `subscription_day_meals`, `subscription_changes`, `subscription_pauses`, `subscription_compensations`, `subscription_cancellations`, `subscription_renewals`, `subscription_price_snapshots`.

## الوجبات والمطبخ

`meals`, `meal_plan`, `meal_allergens`, `meal_alternatives`, `menus`, `menu_days`, `menu_day_meals`, `kitchen_batches`, `kitchen_batch_items`, `meal_labels`.

## التوصيل

`cities`, `delivery_zones`, `delivery_slots`, `delivery_blackout_dates`, `drivers`, `deliveries`, `delivery_status_histories`, `delivery_attempts`, `delivery_proofs`, `delivery_batches`, `delivery_batch_items`.

## الدفع والفوترة

`payment_methods`, `payment_attempts`, `payments`, `payment_webhook_events`, `refunds`, `invoices`, `invoice_items`, `credit_notes`, `financial_adjustments`.

## المواعيد

`appointment_services`, `specialists`, `specialist_schedules`, `specialist_time_off`, `appointments`, `appointment_status_histories`, `appointment_notes`, `appointment_reminders`.

## الخصومات والمحتوى والتواصل

`promotions`, `promotion_targets`, `coupon_codes`, `coupon_redemptions`, `pages`, `page_revisions`, `page_sections`, `banners`, `posts`, `post_categories`, `authors`, `media`, `delivery_partners`, `navigation_items`, `reviews`, `review_replies`, `contact_messages`, `contact_message_notes`, `notification_templates`, `notification_logs`.

## النظام

`settings`, `feature_flags`, `imports`, `import_rows`, `exports`, `failed_jobs`, `jobs`, `cache`.

---

# 12. قواعد تصميم قاعدة البيانات

- Foreign Keys وIndexes حسب الاستخدام.
- Unique indexes لـSKU وpublic IDs وprovider event IDs وcoupon codes.
- Money integer minor units.
- `tax_rate` بدقة مناسبة.
- JSON للـSnapshots أو Metadata فقط، لا للحقول كثيرة الفلترة.
- PHP Enums مع String columns مفهومة.
- `created_by` و`updated_by` عند الحاجة.
- Public ULID/UUID للروابط الخارجية.
- عدم كشف IDs تسلسلية في API العام عند وجود Enumeration risk.
- Locking للمخزون والمواعيد والكوبونات.
- عدم استخدام Cascading Delete قد يمحو سجلاً مالياً.
- لا يتم تعديل سجل حركة مالي أو مخزون تاريخي؛ ينشأ Adjustment عكسي.

---
# 13. مواصفات API

## 13.1 الأساس

- Prefix: `/api/v1`.
- JSON only.
- Authentication: Laravel Sanctum.
- Versioning إلزامي.
- Pagination وFilters وSorting موحدة.
- API Resources.
- Error codes ثابتة.
- Idempotency key للعمليات الحساسة.
- Rate limiting.
- Correlation/Request ID.
- OpenAPI documentation.

## 13.2 شكل النجاح

```json
{
  "data": {},
  "meta": {
    "request_id": "01J..."
  }
}
```

## 13.3 شكل الخطأ

```json
{
  "error": {
    "code": "SUBSCRIPTION_CUTOFF_PASSED",
    "message": "The requested change is no longer allowed.",
    "details": {},
    "request_id": "01J..."
  }
}
```

## 13.4 Endpoints إدارية رئيسية

```text
GET    /api/v1/admin/dashboard

GET    /api/v1/admin/products
POST   /api/v1/admin/products
GET    /api/v1/admin/products/{product}
PUT    /api/v1/admin/products/{product}
DELETE /api/v1/admin/products/{product}

GET    /api/v1/admin/categories
POST   /api/v1/admin/categories

GET    /api/v1/admin/inventory
POST   /api/v1/admin/inventory/adjustments
GET    /api/v1/admin/inventory/movements

GET    /api/v1/admin/orders
POST   /api/v1/admin/orders
GET    /api/v1/admin/orders/{order}
POST   /api/v1/admin/orders/{order}/transitions
POST   /api/v1/admin/orders/{order}/cancel
POST   /api/v1/admin/orders/{order}/refunds

GET    /api/v1/admin/plans
POST   /api/v1/admin/plans
POST   /api/v1/admin/plans/{plan}/versions
POST   /api/v1/admin/plan-quotes

GET    /api/v1/admin/subscriptions
POST   /api/v1/admin/subscriptions
GET    /api/v1/admin/subscriptions/{subscription}
POST   /api/v1/admin/subscriptions/{subscription}/pause
POST   /api/v1/admin/subscriptions/{subscription}/resume
POST   /api/v1/admin/subscriptions/{subscription}/skip-day
POST   /api/v1/admin/subscriptions/{subscription}/compensate-day
POST   /api/v1/admin/subscriptions/{subscription}/change-plan
POST   /api/v1/admin/subscriptions/{subscription}/cancel
POST   /api/v1/admin/subscriptions/{subscription}/renew

GET    /api/v1/admin/subscription-days
POST   /api/v1/admin/subscription-days/{day}/transition

GET    /api/v1/admin/meals
POST   /api/v1/admin/meals
GET    /api/v1/admin/menus
POST   /api/v1/admin/menus

GET    /api/v1/admin/kitchen/production
POST   /api/v1/admin/kitchen/batches
POST   /api/v1/admin/kitchen/items/bulk-transition

GET    /api/v1/admin/deliveries
POST   /api/v1/admin/deliveries/{delivery}/assign
POST   /api/v1/admin/deliveries/{delivery}/transition

GET    /api/v1/admin/customers
GET    /api/v1/admin/customers/{customer}
PUT    /api/v1/admin/customers/{customer}
PUT    /api/v1/admin/customers/{customer}/health-profile

GET    /api/v1/admin/appointments
POST   /api/v1/admin/appointments
POST   /api/v1/admin/appointments/{appointment}/reschedule
POST   /api/v1/admin/appointments/{appointment}/cancel

GET    /api/v1/admin/payments
GET    /api/v1/admin/refunds
GET    /api/v1/admin/invoices

GET    /api/v1/admin/promotions
POST   /api/v1/admin/promotions

GET    /api/v1/admin/content/pages
PUT    /api/v1/admin/content/pages/{page}
POST   /api/v1/admin/content/pages/{page}/publish

GET    /api/v1/admin/reviews
POST   /api/v1/admin/reviews/{review}/approve
POST   /api/v1/admin/reviews/{review}/reject

GET    /api/v1/admin/contact-messages
POST   /api/v1/admin/contact-messages/{message}/assign
POST   /api/v1/admin/contact-messages/{message}/close

GET    /api/v1/admin/reports/{report}
POST   /api/v1/admin/exports

GET    /api/v1/admin/users
POST   /api/v1/admin/users
GET    /api/v1/admin/roles
GET    /api/v1/admin/audit-logs
GET    /api/v1/admin/settings
PUT    /api/v1/admin/settings
```

## 13.5 Endpoints عامة/عميل

```text
GET    /api/v1/catalog/categories
GET    /api/v1/catalog/products
GET    /api/v1/catalog/products/{slug}
GET    /api/v1/plans
POST   /api/v1/plan-quotes
POST   /api/v1/nutrition/assessments
POST   /api/v1/cart/quote
POST   /api/v1/orders
GET    /api/v1/me/orders/{order}
POST   /api/v1/subscriptions
GET    /api/v1/me/subscriptions
GET    /api/v1/me/subscriptions/{subscription}
POST   /api/v1/me/subscriptions/{subscription}/pause-request
POST   /api/v1/me/subscriptions/{subscription}/skip-day-request
GET    /api/v1/appointments/availability
POST   /api/v1/appointments
GET    /api/v1/me/appointments
POST   /api/v1/reviews
POST   /api/v1/contact-messages
POST   /api/v1/payments/webhooks/{provider}
```

---

# 14. مواصفات Web Admin

## مبادئ UX

- Responsive وDesktop-first.
- RTL/LTR.
- Filters محفوظة في Query String.
- Breadcrumbs.
- Bulk actions.
- Confirmations للعمليات الحساسة.
- Status badges موحدة.
- Money/date formatter مركزي.
- Empty states ورسائل خطأ واضحة.
- لا يعتمد القرار على قيم مخفية في Frontend.

## القائمة الرئيسية

Dashboard، Catalog، Inventory، Orders، Plans، Subscriptions، Meals & Menus، Kitchen، Deliveries، Customers، Appointments، Payments & Invoices، Promotions، Content، Reviews، Contact Messages، Reports، Users & Roles، Audit Logs، Settings.

## شاشة التفاصيل

كل كيان تشغيلي مهم يعرض Summary، Status، Allowed actions، Related records، Timeline، Notes، Audit، Attachments، وFinancial breakdown عند الحاجة.

---

# 15. المتطلبات غير الوظيفية

## 15.1 الأداء

- Pagination للقوائم.
- منع N+1.
- Indexes مدروسة.
- Export الكبير Queue.
- Dashboard بQueries محسنة وCache.
- هدف إرشادي: أغلب Reads أقل من 500ms بالحمل الطبيعي.
- Streaming/Chunking للملفات الكبيرة.
- تحسين الصور وعدم تحميل أحجام أصلية دون حاجة.

## 15.2 الأمان

- CSRF للويب.
- Sanctum للـAPI.
- Rate limiting.
- Least privilege.
- تشفير أسرار التكاملات.
- عدم تسجيل Tokens أو Card data.
- Validation للUploads.
- Signed URLs للملفات الخاصة.
- حماية من IDOR عبر Policies.
- CORS مقيد.
- Security headers.
- Audit للعمليات الحساسة.
- Session timeout للإدارة.
- فصل البيانات الصحية عن Resources العامة.
- Backups مشفرة واختبار الاسترجاع.

## 15.3 الاعتمادية

- Transactions.
- Idempotent webhooks.
- Retry policies.
- Failed jobs review.
- Queue monitoring.
- Health checks.
- Structured logging.
- Timeouts للتكاملات.
- فشل الإشعار لا يفشل العملية الأساسية.

## 15.4 القابلية للصيانة

- Laravel conventions وPSR-12.
- `strict_types=1` في Domain الجديد.
- Enums للحالات.
- DTOs للمدخلات المعقدة.
- Services صغيرة ومركزة.
- عدم استخدام Global helpers للبزنس.
- ADRs للقرارات المعمارية.
- README لكل Module.
- API versioning.

## 15.5 الترجمة وإمكانية الوصول

- كل Labels ورسائل Validation قابلة للترجمة.
- `Accept-Language` للـAPI.
- Locale لا يؤثر على الحسابات.
- Keyboard navigation وLabels وContrast مناسب.
- لا يعتمد عرض الحالة على اللون فقط.

---

# 16. الاختبارات

## الأنواع

- Unit tests للحسابات والقواعد.
- Service tests لكل Use Case.
- Feature tests للويب.
- API tests.
- Policy tests.
- State transition tests.
- Payment webhook tests.
- Concurrency tests.
- Queue/Event tests.
- Export tests.
- Localization tests.
- Integration tests عبر Fakes.
- End-to-end للتدفقات الحرجة.

## حالات إلزامية

1. إنشاء طلب بسعر صحيح.
2. منع التلاعب بالسعر.
3. حجز آخر قطعة بالتزامن.
4. انتهاء حجز المخزون.
5. Webhook مكرر.
6. Refund أكبر من المدفوع.
7. إنشاء اشتراك بأيام صحيحة.
8. Pause قبل وبعد Cutoff.
9. Compensation غير مكرر.
10. تغيير خطة مع فرق سعر.
11. وجبة تتعارض مع حساسية.
12. Double booking appointment.
13. Coupon يتجاوز حد الاستخدام بالتزامن.
14. مستخدم بلا صلاحية يحصل على 403.
15. بيانات صحية غير ظاهرة في Resource عام.
16. فشل Notification لا يفشل الطلب.
17. تعديل سعر لا يغير التاريخ.
18. Transition غير قانوني يرفض.
19. تقرير مالي يطابق الطلبات والفواتير.
20. Web وAPI يستدعيان نفس Service ويعطيان نتيجة متطابقة.

## هدف التغطية

- Services/Rules/Calculators: 85%+ إرشادياً.
- Payment/Subscription/Inventory critical paths: تغطية شبه كاملة.
- لا يعتمد القبول على Coverage فقط؛ القواعد الحرجة يجب اختبارها فعلياً.

---

# 17. المراقبة والسجلات

- Request ID.
- User ID.
- Customer ID عند الحاجة.
- Entity type وID.
- Provider reference.
- Queue job ID.
- مدة التنفيذ وError code.
- عدم تسجيل البيانات الصحية الكاملة أو الأسرار.
- Alerts لفشل الدفع وتراكم Queue وفشل Webhooks وانخفاض المخزون.
- Daily reconciliation summary.

---

# 18. الترحيل من النظام الحالي

## البيانات المحتملة

العملاء، المنتجات، التصنيفات، الصور، الأسعار، المخزون، الطلبات المفتوحة، الاشتراكات النشطة، المواعيد القادمة، المحتوى، التقييمات، وإعدادات التواصل.

## القواعد

- Staging قبل الإنتاج.
- Import batch report.
- Mapping موثق.
- Dry run وValidation وDuplicate detection.
- Reconciliation للأعداد والمبالغ.
- حفظ Legacy IDs.
- Rollback plan.
- Freeze أو Delta sync أثناء Cutover.
- Password reset إذا كانت Hashes غير متوافقة.

---

# 19. مراحل التنفيذ

## المرحلة 0: Foundation

Laravel project، Authentication، Roles/Permissions، Service architecture skeleton، DTOs/Exceptions، API standard، Audit، Settings، CI، Queue، Storage، Localization، Static analysis واختبارات الأساس.

## المرحلة 1: Catalog & Inventory

Categories، Products، Variants، Media، Inventory، Imports/Exports، Public catalog API.

## المرحلة 2: Orders & Payments

Cart quote، Orders، Pricing، Coupons الأساسية، Payment abstraction، Webhooks، Invoices، Refunds.

## المرحلة 3: Plans & Subscriptions

Plans/Versions، Pricing matrix، Assessment، Subscriptions، Schedule days، Pause/Resume/Skip/Compensation، Renewal/Cancellation.

## المرحلة 4: Meals, Kitchen & Delivery

Meals، Menus، Assignment، Production، Labels، Delivery zones/slots، Deliveries/Batches.

## المرحلة 5: Appointments & CRM

Specialists، Availability، Booking، Reminders، Customer 360، Health permissions.

## المرحلة 6: CMS & Communication

Pages، Banners، Blog، Reviews، Contact messages، Notification templates، Partners.

## المرحلة 7: Reports & Hardening

Dashboard، Reports، Performance، Security، Backups، Load/Concurrency tests، Migration، UAT، Production.

---

# 20. أولويات MVP

## Must Have

Authentication، Roles/Permissions، Products/Categories/Variants، Inventory، Orders، Payments/Webhooks، Plans/Pricing، Subscriptions/Days، Pause/Resume/Skip/Compensation، Meals/Production، Delivery، Customers، Appointments الأساسية، CMS الأساسي، Notifications، Audit، Basic reports.

## Should Have

Questionnaire editor، Advanced menu assignment، Driver batching، Imports/Exports، Advanced appointment notes، Content revisions، Advanced reports.

## Could Have

Loyalty، Wallet، Referral، Multi-warehouse، Production costing، External delivery APIs، Push، BI connector.

---

# 21. Definition of Done

أي Feature لا تعتبر مكتملة إلا إذا:

1. لها Migration وIndexes.
2. لها Model وRelations وCasts.
3. الحالات Enums.
4. لها Form Request.
5. لها DTO عند تعقيد المدخلات.
6. لها Service/Use Case.
7. لا يوجد Business Logic في Controller.
8. لها Policy/Permission.
9. Web Controller عند الحاجة.
10. API Controller/Resource عند الحاجة.
11. Web وAPI يستخدمان نفس Service.
12. العمليات متعددة الجداول داخل Transaction.
13. Side effects غير الحرجة Queue.
14. Audit مطبق عند الحاجة.
15. Tests للنجاح والفشل والصلاحيات.
16. Validation messages مترجمة.
17. API موثق.
18. لا توجد N+1 واضحة.
19. الأخطاء لها Codes ثابتة.
20. Security review.
21. UI مراجَع باللغتين.
22. Factory/Seeder للاختبار.
23. CI ناجحة.
24. UAT معتمدة.

---

# 22. قواعد إلزامية لـCursor

انسخ التالي إلى `docs/architecture-rules.md`:

```text
1. Do not place business logic in Web Controllers, API Controllers, Blade,
   Livewire, Inertia pages, Form Requests, API Resources, Jobs, or Listeners.

2. Every use case must have one central application service shared by Web and API.

3. Controllers may only receive validated input, authorize, map to a DTO,
   call one application service, and return an HTTP response.

4. Application services must not depend on HTTP Request, JsonResponse,
   RedirectResponse, View, session, or route helpers.

5. Pricing, tax, discounts, stock changes, state transitions, scheduling,
   refunds, and payment processing must exist only in services/rules.

6. Database transactions belong inside the service responsible for the use case.

7. Use explicit enums and transition validation. Never update a status directly
   from a generic CRUD controller.

8. Payment, SMS, WhatsApp, email, delivery, and storage providers must use contracts.

9. Webhooks must be signature-verified and idempotent.

10. Events and queued listeners are for side effects and must not duplicate
    the core business decision.

11. Jobs call services instead of reimplementing business logic.

12. API Resources format output only.

13. Form Requests perform input validation, not transactional business validation.

14. Never trust totals, prices, discounts, tax, eligibility, stock, or status
    values sent by the frontend.

15. Every critical use case requires success, authorization, validation,
    business-rule rejection, and concurrency tests where relevant.

16. Do not create a repository for every model. Use repositories selectively.

17. Split large services by use case. Do not create god services.

18. All financial amounts use integer minor units and one Money utility.

19. Every sensitive state-changing endpoint creates an audit entry.

20. Before coding a module, read the BRD and identify rules, entities, states,
    permissions, events, and acceptance criteria.
```

---

# 23. Master Prompt لـCursor

```text
Read docs/BRD-NewMe-Admin-Laravel-Service-Architecture.md and
read docs/architecture-rules.md.

You are implementing a production-grade Laravel modular monolith for the
New Me admin and operations platform.

Implement only the module or use case I explicitly request. Do not generate
unrelated modules.

Mandatory architecture:
- Business logic is centralized in application/domain services.
- Web controllers and API controllers share the same services.
- Controllers remain thin.
- Form Requests handle input validation.
- DTOs carry validated input.
- Policies and permissions handle authorization.
- API Resources handle JSON representation.
- Database transactions belong in services.
- Use enums and explicit state-transition validation.
- Use events and queued listeners for non-critical side effects.
- External providers use contracts.
- Webhooks are idempotent.
- Add audit logging for sensitive operations.
- Add automated tests.

For each requested module, first return:
1. assumptions,
2. entities and migrations,
3. enums and states,
4. business rules,
5. service/use-case classes,
6. requests and DTOs,
7. policies and permissions,
8. web controllers,
9. API controllers and resources,
10. routes,
11. events/listeners/jobs,
12. tests,
13. implementation order.

Then implement the code in small, reviewable steps.

Never put calculations, stock changes, payment logic, subscription scheduling,
status transitions, or multi-model updates inside a controller.
```

---

# 24. Prompt تنفيذ أي موديول

```text
Read the BRD and architecture rules.

Implement the [MODULE NAME] module only.

Requirements:
- Follow all FR IDs for this module.
- Create migrations, models, relations, casts, factories, and seeders.
- Create enums for statuses.
- Create immutable DTOs for service inputs.
- Create focused use-case services.
- Keep all business logic in services.
- Create Form Requests.
- Create Policies and permission names.
- Create thin Admin Web Controllers.
- Create thin API V1 Controllers using the same services.
- Create API Resources and routes.
- Add events, listeners, and jobs where needed.
- Add audit logging.
- Add unit, service, feature, API, authorization, and failure tests.
- Add concurrency tests for stock, slots, coupons, and payment idempotency.
- Do not alter unrelated modules.
- Before coding, show the proposed file tree and business flow.
```

---

# 25. أول Prompts عملية

## Foundation

```text
Implement Phase 0 Foundation from the BRD: authentication, admin users,
roles, permissions, base API response format, domain exception mapping,
audit log foundation, settings foundation, localization, queue configuration,
and the base service/DTO structure. Do not implement products or orders yet.
```

## Catalog

```text
Implement Categories, Products, Product Variants, Product Images, Allergens,
and product pricing history. Include bilingual fields, SKU uniqueness,
activation rules, soft deletion, policies, Web/Admin API, and tests.
```

## Inventory

```text
Implement Inventory as a ledger-based module. Stock may only change through
Inventory services. Include movements, reservations, reservation expiry,
adjustments, row locking, low-stock rules, permissions, audit, and concurrency tests.
```

## Order Pricing

```text
Implement order quotation and pricing services. The frontend sends only
product/variant IDs, quantities, address/zone, and coupon code. Calculate all
price, discount, delivery, and tax values on the server and return a typed
quote DTO with an expiry.
```

## Orders and Payments

```text
Implement order creation, stock reservation, order state transitions,
payment attempts, payment gateway contract, idempotent webhook processing,
invoice creation, cancellation, and refunds. Use transactions and after-commit events.
```

## Plans and Subscriptions

```text
Implement plans, plan versions, pricing matrices, plan quotes, subscriptions,
subscription days, pause, resume, skip day, compensation, cancellation, and
renewal. A subscription day must be a persisted entity. Add full service tests
for date generation and cutoff rules.
```

---

# 26. قرارات يجب اعتمادها قبل الإنتاج

1. بوابة الدفع.
2. هل الدفع عند الاستلام متاح؟
3. لحظة خصم المخزون.
4. مدة حجز المخزون.
5. سياسة إلغاء الطلب بعد بدء التجهيز.
6. Cutoff لتعديل اشتراك اليوم التالي.
7. الحد الأقصى لـPause/Freeze.
8. هل Pause يمدد نهاية الاشتراك؟
9. سياسة Compensation.
10. سياسة فرق السعر عند تغيير الخطة.
11. Renewal كسجل جديد أم تمديد؟ التوصية: سجل جديد مرتبط.
12. طريقة اختيار الوجبات.
13. حد الإنتاج اليومي.
14. مناطق ورسوم التوصيل.
15. Slots والطاقة الاستيعابية.
16. هل الاستشارة مدفوعة؟
17. سياسة إلغاء الموعد.
18. Providers الرسائل وWhatsApp.
19. الصلاحيات النهائية.
20. مدة الاحتفاظ بالسجلات والExports.
21. بيانات الترحيل.
22. Blade/Livewire أم Inertia/React.
23. هل يوجد تطبيق جوال من أول إصدار؟
24. هل Odoo يستمر بالتوازي أم يستبدل؟

---

# 27. التوصية التنفيذية النهائية

ابدأ كـModular Monolith، وليس Microservices. المقصود بـService Architecture هو فصل حالات الاستخدام ومنطق الأعمال داخل Services مركزية، وليس توزيع النظام على عدة خدمات مستقلة.

الترتيب الصحيح: Foundation، Catalog، Inventory، Pricing، Orders، Payments، Plans، Subscriptions، Meals/Kitchen، Delivery، Appointments، ثم CMS/Reports.

أخطر الأجزاء هي التسعير، المخزون المتزامن، Webhooks، Subscription scheduling، Pause/Freeze/Compensation، State transitions، Refunds، وAppointment concurrency. هذه الأجزاء تنفذ وتختبر قبل بناء واجهات كبيرة حولها.
