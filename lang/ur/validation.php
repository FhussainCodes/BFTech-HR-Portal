<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (Urdu / اردو)
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute کو قبول کرنا ضروری ہے۔',
    'accepted_if' => 'جب :other :value ہو، تو :attribute کو قبول کرنا ضروری ہے۔',
    'active_url' => ':attribute ایک درست URL ہونا چاہیے۔',
    'after' => ':attribute :date کے بعد کی تاریخ ہونی چاہیے۔',
    'after_or_equal' => ':attribute :date یا اس کے بعد کی تاریخ ہونی چاہیے۔',
    'alpha' => ':attribute میں صرف حروف ہونے چاہئیں۔',
    'alpha_dash' => ':attribute میں صرف حروف، اعداد، ڈیش اور انڈر اسکور ہو سکتے ہیں۔',
    'alpha_num' => ':attribute میں صرف حروف اور اعداد ہونے چاہئیں۔',
    'any_of' => ':attribute کا انتخاب غلط ہے۔',
    'array' => ':attribute کا ایک ایرے (array) ہونا ضروری ہے۔',
    'ascii' => ':attribute میں صرف سنگل بائٹ کے حروف اور علامات ہو سکتی ہیں۔',
    'before' => ':attribute :date سے پہلے کی تاریخ ہونی چاہیے۔',
    'before_or_equal' => ':attribute :date یا اس سے پہلے کی تاریخ ہونی چاہیے۔',
    'between' => [
        'array' => ':attribute میں :min سے :max کے درمیان آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute کا سائز :min سے :max کلوبائٹس کے درمیان ہونا چاہیے۔',
        'numeric' => ':attribute کی قیمت :min سے :max کے درمیان ہونی چاہیے۔',
        'string' => ':attribute :min سے :max حروف کے درمیان ہونا چاہیے۔',
    ],
    'boolean' => ':attribute کی قیمت صحیح یا غلط (true/false) ہونی چاہیے۔',
    'can' => ':attribute میں غیر مجاز قیمت موجود ہے۔',
    'confirmed' => ':attribute کی تصدیق مطابقت نہیں رکھتی۔',
    'contains' => ':attribute میں مطلوبہ قیمت موجود نہیں ہے۔',
    'current_password' => 'پاس ورڈ غلط ہے۔',
    'date' => ':attribute ایک درست تاریخ ہونی چاہیے۔',
    'date_equals' => ':attribute :date کے برابر تاریخ ہونی چاہیے۔',
    'date_format' => ':attribute کا فارمیٹ :format کے مطابق ہونا چاہیے۔',
    'decimal' => ':attribute میں :decimal اعشاریہ جگہوں کا ہونا ضروری ہے۔',
    'declined' => ':attribute کو مسترد کرنا ضروری ہے۔',
    'declined_if' => 'جب :other :value ہو، تو :attribute کو مسترد کرنا ضروری ہے۔',
    'different' => ':attribute اور :other مختلف ہونے چاہئیں۔',
    'digits' => ':attribute :digits ہندسوں پر مشتمل ہونا چاہیے۔',
    'digits_between' => ':attribute :min سے :max ہندسوں کے درمیان ہونا چاہیے۔',
    'dimensions' => ':attribute کا سائز (dimensions) درست نہیں ہے۔',
    'distinct' => ':attribute میں ایک سے زیادہ یکساں قیمتیں موجود ہیں۔',
    'doesnt_contain' => ':attribute میں مندرجہ ذیل قیمتیں شامل نہیں ہونی چاہئیں: :values۔',
    'doesnt_end_with' => ':attribute ان میں سے کسی پر ختم نہیں ہونا چاہیے: :values۔',
    'doesnt_start_with' => ':attribute ان میں سے کسی سے شروع نہیں ہونا چاہیے: :values۔',
    'email' => ':attribute ایک درست ای میل ایڈریس ہونا چاہیے۔',
    'encoding' => ':attribute کی انکوڈنگ :encoding ہونی چاہیے۔',
    'ends_with' => ':attribute ان میں سے کسی ایک پر ختم ہونا چاہیے: :values۔',
    'enum' => 'منتخب کردہ :attribute غلط ہے۔',
    'exists' => 'منتخب کردہ :attribute غلط ہے۔',
    'extensions' => ':attribute کی فائل ایکسٹینشن ان میں سے ہونی چاہیے: :values۔',
    'file' => ':attribute ایک فائل ہونی چاہیے۔',
    'filled' => ':attribute میں قیمت کا ہونا ضروری ہے۔',
    'gt' => [
        'array' => ':attribute میں :value سے زیادہ آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute :value کلوبائٹس سے بڑا ہونا چاہیے۔',
        'numeric' => ':attribute :value سے بڑا ہونا چاہیے۔',
        'string' => ':attribute :value حروف سے زیادہ ہونا چاہیے۔',
    ],
    'gte' => [
        'array' => ':attribute میں :value یا اس سے زیادہ آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute :value کلوبائٹس یا اس سے بڑا ہونا چاہیے۔',
        'numeric' => ':attribute :value یا اس سے بڑا ہونا چاہیے۔',
        'string' => ':attribute :value یا اس سے زیادہ حروف کا ہونا چاہیے۔',
    ],
    'hex_color' => ':attribute ایک درست ہیکساڈیسمل (hex) رنگ ہونا چاہیے۔',
    'image' => ':attribute ایک تصویر ہونی چاہیے۔',
    'in' => 'منتخب کردہ :attribute غلط ہے۔',
    'in_array' => ':attribute کا :other میں ہونا ضروری ہے۔',
    'in_array_keys' => ':attribute میں ان میں سے کم از کم ایک کلید (key) ہونی چاہیے: :values۔',
    'integer' => ':attribute کا ایک عدد (integer) ہونا ضروری ہے۔',
    'ip' => ':attribute ایک درست IP ایڈریس ہونا چاہیے۔',
    'ipv4' => ':attribute ایک درست IPv4 ایڈریس ہونا چاہیے۔',
    'ipv6' => ':attribute ایک درست IPv6 ایڈریس ہونا چاہیے۔',
    'json' => ':attribute ایک درست JSON سٹرنگ ہونی چاہیے۔',
    'list' => ':attribute کا ایک فہرست (list) ہونا ضروری ہے۔',
    'lowercase' => ':attribute چھوٹے حروف (lowercase) میں ہونا چاہیے۔',
    'lt' => [
        'array' => ':attribute میں :value سے کم آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute :value کلوبائٹس سے چھوٹا ہونا چاہیے۔',
        'numeric' => ':attribute :value سے چھوٹا ہونا چاہیے۔',
        'string' => ':attribute :value حروف سے کم ہونا چاہیے۔',
    ],
    'lte' => [
        'array' => ':attribute میں :value سے زیادہ آئٹمز نہیں ہونے چاہئیں۔',
        'file' => ':attribute :value کلوبائٹس یا اس سے چھوٹا ہونا چاہیے۔',
        'numeric' => ':attribute :value یا اس سے چھوٹا ہونا چاہیے۔',
        'string' => ':attribute :value یا اس سے کم حروف کا ہونا چاہیے۔',
    ],
    'mac_address' => ':attribute ایک درست MAC ایڈریس ہونا چاہیے۔',
    'max' => [
        'array' => ':attribute میں :max سے زیادہ آئٹمز نہیں ہونے چاہئیں۔',
        'file' => ':attribute :max کلوبائٹس سے بڑا نہیں ہونا چاہیے۔',
        'numeric' => ':attribute :max سے بڑا نہیں ہونا چاہیے۔',
        'string' => ':attribute :max حروف سے بڑا نہیں ہونا چاہیے۔',
    ],
    'max_digits' => ':attribute میں :max سے زیادہ ہندسے نہیں ہونے چاہئیں۔',
    'mimes' => ':attribute اس قسم کی فائل ہونی چاہیے: :values۔',
    'mimetypes' => ':attribute اس قسم کی فائل ہونی چاہیے: :values۔',
    'min' => [
        'array' => ':attribute میں کم از کم :min آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute کم از کم :min کلوبائٹس کا ہونا چاہیے۔',
        'numeric' => ':attribute کم از کم :min ہونا چاہیے۔',
        'string' => ':attribute کم از کم :min حروف کا ہونا چاہیے۔',
    ],
    'min_digits' => ':attribute میں کم از کم :min ہندسے ہونے چاہئیں۔',
    'missing' => ':attribute کا موجود نہ ہونا ضروری ہے۔',
    'missing_if' => 'جب :other :value ہو، تو :attribute کا موجود نہ ہونا ضروری ہے۔',
    'missing_unless' => 'جب تک :other :value نہ ہو، :attribute کا موجود نہ ہونا ضروری ہے۔',
    'missing_with' => 'جب :values موجود ہو، تو :attribute کا موجود نہ ہونا ضروری ہے۔',
    'missing_with_all' => 'جب :values موجود ہوں، تو :attribute کا موجود نہ ہونا ضروری ہے۔',
    'multiple_of' => ':attribute :value کا ملٹی پل (multiple) ہونا چاہیے۔',
    'not_in' => 'منتخب کردہ :attribute غلط ہے۔',
    'not_regex' => ':attribute کا فارمیٹ درست نہیں ہے۔',
    'numeric' => ':attribute ایک عدد ہونا چاہیے۔',
    'password' => [
        'letters' => ':attribute میں کم از کم ایک حرف ہونا ضروری ہے۔',
        'mixed' => ':attribute میں کم از کم ایک بڑا اور ایک چھوٹا حرف ہونا ضروری ہے۔',
        'numbers' => ':attribute میں کم از کم ایک عدد ہونا ضروری ہے۔',
        'symbols' => ':attribute میں کم از کم ایک علامت (symbol) ہونی چاہیے۔',
        'uncompromised' => 'دیا گیا :attribute ڈیٹا لیک میں سامنے آ چکا ہے۔ برائے مہربانی ایک مختلف :attribute منتخب کریں۔',
    ],
    'present' => ':attribute کا فیلڈ موجود ہونا ضروری ہے۔',
    'present_if' => 'جب :other :value ہو، تو :attribute کا فیلڈ موجود ہونا ضروری ہے۔',
    'present_unless' => 'جب تک :other :value نہ ہو، :attribute کا فیلڈ موجود ہونا ضروری ہے۔',
    'present_with' => 'جب :values موجود ہو، تو :attribute کا فیلڈ موجود ہونا ضروری ہے۔',
    'present_with_all' => 'جب :values موجود ہوں، تو :attribute کا فیلڈ موجود ہونا ضروری ہے۔',
    'prohibited' => ':attribute فیلڈ ممنوع ہے۔',
    'prohibited_if' => 'جب :other :value ہو، تو :attribute فیلڈ ممنوع ہے۔',
    'prohibited_if_accepted' => 'جب :other قبول ہو، تو :attribute فیلڈ ممنوع ہے۔',
    'prohibited_if_declined' => 'جب :other مسترد ہو، تو :attribute فیلڈ ممنوع ہے۔',
    'prohibited_unless' => 'جب تک :other :values میں سے نہ ہو، :attribute فیلڈ ممنوع ہے۔',
    'prohibits' => ':attribute فیلڈ :other کو موجود ہونے سے روکتی ہے۔',
    'regex' => ':attribute کا فارمیٹ درست نہیں ہے۔',
    'required' => ':attribute فیلڈ ضروری ہے۔',
    'required_array_keys' => ':attribute میں ان اینٹریز کا ہونا ضروری ہے: :values۔',
    'required_if' => 'جب :other :value ہو، تو :attribute فیلڈ ضروری ہے۔',
    'required_if_accepted' => 'جب :other قبول ہو، تو :attribute فیلڈ ضروری ہے۔',
    'required_if_declined' => 'جب :other مسترد ہو، تو :attribute فیلڈ ضروری ہے۔',
    'required_unless' => 'جب تک :other :values میں سے نہ ہو، :attribute فیلڈ ضروری ہے۔',
    'required_with' => 'جب :values موجود ہو، تو :attribute فیلڈ ضروری ہے۔',
    'required_with_all' => 'جب :values موجود ہوں، تو :attribute فیلڈ ضروری ہے۔',
    'required_without' => 'جب :values موجود نہ ہو، تو :attribute فیلڈ ضروری ہے۔',
    'required_without_all' => 'جب :values میں سے کوئی بھی موجود نہ ہو، تو :attribute فیلڈ ضروری ہے۔',
    'same' => ':attribute اور :other آپس میں ملنے چاہئیں۔',
    'size' => [
        'array' => ':attribute میں :size آئٹمز ہونے چاہئیں۔',
        'file' => ':attribute :size کلوبائٹس کا ہونا چاہیے۔',
        'numeric' => ':attribute :size ہونا چاہیے۔',
        'string' => ':attribute :size حروف کا ہونا چاہیے۔',
    ],
    'starts_with' => ':attribute ان میں سے کسی ایک سے شروع ہونا چاہیے: :values۔',
    'string' => ':attribute ایک سٹرنگ ہونا چاہیے۔',
    'timezone' => ':attribute ایک درست ٹائم زون ہونا چاہیے۔',
    'unique' => ':attribute پہلے سے استعمال میں ہے۔',
    'uploaded' => ':attribute اپ لوڈ کرنے میں ناکامی ہوئی۔',
    'uppercase' => ':attribute بڑے حروف (uppercase) میں ہونا چاہیے۔',
    'url' => ':attribute کا فارمیٹ ایک درست URL ہونا چاہیے۔',
    'ulid' => ':attribute ایک درست ULID ہونا چاہیے۔',
    'uuid' => ':attribute ایک درست UUID ہونا چاہیے۔',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'کسٹم پیغام',
        ],
        'email' => [
    'required' => 'ای میل ایڈریس درج کرنا ضروری ہے۔',
    'email'    => 'براہ کرم درست ای میل ایڈریس درج کریں۔',
    'unique'   => 'یہ ای میل ایڈریس پہلے سے استعمال ہو رہا ہے۔',
],

'phone_number' => [
    'required' => 'براہ کرم اپنا فون نمبر درج کریں۔',
    'regex'    => 'براہ کرم درست پاکستانی موبائل نمبر درج کریں (مثلاً 03001234567)۔',
],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'name'                  => 'نام',
        'username'              => 'یوزر نام',
        'email'                 => 'ای میل',
        'first_name'            => 'پہلا نام',
        'last_name'             => 'آخری نام',
        'password'              => 'پاس ورڈ',
        'password_confirmation' => 'پاس ورڈ کی تصدیق',
        'city'                  => 'شہر',
        'country'               => 'ملک',
        'address'               => 'پتہ',
        'phone'                 => 'فون نمبر',
        'mobile'                => 'موبائل نمبر',
        'age'                   => 'عمر',
        'sex'                   => 'جنس',
        'gender'                => 'جنس',
        'day'                   => 'دن',
        'month'                 => 'مہینہ',
        'year'                  => 'سال',
        'hour'                  => 'گھنٹہ',
        'minute'                => 'منٹ',
        'second'                => 'سیکنڈ',
        'title'                 => 'عنوان',
        'content'               => 'مواد',
        'description'           => 'تفصیل',
        'excerpt'               => 'اقتباس',
        'date'                  => 'تاریخ',
        'time'                  => 'وقت',
        'available'             => 'دستیاب',
        'size'                  => 'سائز',
    ],

];