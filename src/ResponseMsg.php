<?php

namespace Alhoqbani\MobilyWs;

class ResponseMsg
{
    public static function balance($code)
    {
        $arrayBalance = array();
        $arrayBalance[0] = "لم يتم الاتصال بالخادم";
        $arrayBalance[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayBalance[2] = "كلمة المرور غير صحيحه";
        $arrayBalance[3] = "رصيدك الحالي هو %s نقطه من اصل %s نقطة";
        if(array_key_exists($code, $arrayBalance)) {
            return $arrayBalance[$code];
        }
        return 3;
    }

    public static function forgetPassword($code) {
        $arrayForgetPassword = array();
        $arrayForgetPassword[0] = "لم يتم الاتصال بالخادم";
        $arrayForgetPassword[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayForgetPassword[2] = "الإيميل الخاص بالحساب غير متوفر";
        $arrayForgetPassword[3] = "تم إرسال كلمة المرور على الجوال بنجاح";
        $arrayForgetPassword[4] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arrayForgetPassword[5] = "تم إرسال كلمة المرور على الإيميل بنجاح";
        $arrayForgetPassword[6] = "الإيميل الخاص بالحساب غير صحيح";
        $arrayForgetPassword[7] = "رقم الجوال (إسم المستخدم) غير صحيح";

        return $arrayForgetPassword[$code];
    }

    public static function changePassword($code) {
        $arrayChangePassword = array();
        $arrayChangePassword[0] = "لم يتم الاتصال بالخادم";
        $arrayChangePassword[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayChangePassword[2] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arrayChangePassword[3] = "تمت عملية تغيير كلمة المرور بنجاح";
        $arrayChangePassword[4] = "كلمة المرور الجديده غير صحيحة";

        return $arrayChangePassword[$code];
    }

    public static function msgSend($code) {
        $arraySendMsg = array();
        $arraySendMsg[0] = "لم يتم الاتصال بالخادم";
        $arraySendMsg[1] = "تمت عملية الإرسال بنجاح";
        $arraySendMsg[2] = "رصيدك 0 , الرجاء إعادة التعبئة حتى تتمكن من إرسال الرسائل";
        $arraySendMsg[3] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arraySendMsg[4] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arraySendMsg[5] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arraySendMsg[6] = "صفحة الانترنت غير فعالة , حاول الارسال من جديد";
        $arraySendMsg[7] = "نظام المدارس غير فعال";
        $arraySendMsg[8] = "تكرار رمز المدرسة لنفس المستخدم";
        $arraySendMsg[9] = "انتهاء الفترة التجريبية";
        $arraySendMsg[10] = "عدد الارقام لا يساوي عدد الرسائل";
        $arraySendMsg[11] = "اشتراكك لا يتيح لك ارسال رسائل لهذه المدرسة. يجب عليك تفعيل الاشتراك لهذه المدرسة";
        $arraySendMsg[12] = "إصدار البوابة غير صحيح";
        $arraySendMsg[13] = "الرقم المرسل به غير مفعل أو لا يوجد الرمز BS في نهاية الرسالة";
        $arraySendMsg[14] = "غير مصرح لك بالإرسال بإستخدام هذا المرسل";
        $arraySendMsg[15] = "الأرقام المرسل لها غير موجوده أو غير صحيحه";
        $arraySendMsg[16] = "إسم المرسل فارغ، أو غير صحيح";
        $arraySendMsg[17] = "نص الرسالة غير متوفر أو غير مشفر بشكل صحيح";
        $arraySendMsg[18] = "تم ايقاف الارسال من المزود";
        $arraySendMsg[19] = "لم يتم العثور على مفتاح نوع التطبيق";

        return $arraySendMsg[$code];
    }


    public function allOriginalMessages() {
        //تستخدم هذه القيمة في حال كانت نتيجة العمليه غير معرفه
        $undefinedResult = "نتيجة العملية غير معرفه، الرجاء المحاول مجددا";

//الرسائل الناتجه من دالة فحص إرسال موبايلي
        $arraySendStatus = array();
        $arraySendStatus[0] = "نعتذر الإرسال متوقف الآن";
        $arraySendStatus[1] = "يمكنك الإرسال الآن";

//الرسائل الناتجه من دالة تغيير كلمة المرور
        $arrayChangePassword = array();
        $arrayChangePassword[0] = "لم يتم الاتصال بالخادم";
        $arrayChangePassword[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayChangePassword[2] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arrayChangePassword[3] = "تمت عملية تغيير كلمة المرور بنجاح";
        $arrayChangePassword[4] = "كلمة المرور الجديده غير صحيحة";

//الرسائل الناتجه من دالة إسترجاع كلمة المرور
        $arrayForgetPassword = array();
        $arrayForgetPassword[0] = "لم يتم الاتصال بالخادم";
        $arrayForgetPassword[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayForgetPassword[2] = "الإيميل الخاص بالحساب غير متوفر";
        $arrayForgetPassword[3] = "تم إرسال كلمة المرور على الجوال بنجاح";
        $arrayForgetPassword[4] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arrayForgetPassword[5] = "تم إرسال كلمة المرور على الإيميل بنجاح";
        $arrayForgetPassword[6] = "الإيميل الخاص بالحساب غير صحيح";
        $arrayForgetPassword[7] = "رقم الجوال (إسم المستخدم) غير صحيح";

//الرسائل الناتجه من دالة الإرسال
        $arraySendMsg = array();
        $arraySendMsg[0] = "لم يتم الاتصال بالخادم";
        $arraySendMsg[1] = "تمت عملية الإرسال بنجاح";
        $arraySendMsg[2] = "رصيدك 0 , الرجاء إعادة التعبئة حتى تتمكن من إرسال الرسائل";
        $arraySendMsg[3] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arraySendMsg[4] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arraySendMsg[5] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arraySendMsg[6] = "صفحة الانترنت غير فعالة , حاول الارسال من جديد";
        $arraySendMsg[7] = "نظام المدارس غير فعال";
        $arraySendMsg[8] = "تكرار رمز المدرسة لنفس المستخدم";
        $arraySendMsg[9] = "انتهاء الفترة التجريبية";
        $arraySendMsg[10] = "عدد الارقام لا يساوي عدد الرسائل";
        $arraySendMsg[11] = "اشتراكك لا يتيح لك ارسال رسائل لهذه المدرسة. يجب عليك تفعيل الاشتراك لهذه المدرسة";
        $arraySendMsg[12] = "إصدار البوابة غير صحيح";
        $arraySendMsg[13] = "الرقم المرسل به غير مفعل أو لا يوجد الرمز BS في نهاية الرسالة";
        $arraySendMsg[14] = "غير مصرح لك بالإرسال بإستخدام هذا المرسل";
        $arraySendMsg[15] = "الأرقام المرسل لها غير موجوده أو غير صحيحه";
        $arraySendMsg[16] = "إسم المرسل فارغ، أو غير صحيح";
        $arraySendMsg[17] = "نص الرسالة غير متوفر أو غير مشفر بشكل صحيح";
        $arraySendMsg[18] = "تم ايقاف الارسال من المزود";
        $arraySendMsg[19] = "لم يتم العثور على مفتاح نوع التطبيق";

        $arrayDeleteSMS = array();
        $arrayDeleteSMS[1] = "تمت عملية الحذف بنجاح";
        $arrayDeleteSMS[2] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayDeleteSMS[3] = "كلمة المرور غير صحيحه";
        $arrayDeleteSMS[4] = "الإرساليه المطلوب حذفها غير متوفره، أو رقم deleteKey خاطئ";

//الرسائل الناتجه من دالة طلب الرصيد
        $arrayBalance = array();
        $arrayBalance[0] = "لم يتم الاتصال بالخادم";
        $arrayBalance[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayBalance[2] = "كلمة المرور غير صحيحه";
        $arrayBalance[3] = "رصيدك الحالي هو %s نقطه من اصل %s نقطة";

//الرسائل الناتجه من دالة التحقق من طلب إسم المرسل - الأحرف الهجائية
        $arrayCheckAlphasSender = array();
        $arrayCheckAlphasSender[0] = "لم يتم الاتصال بالخادم";
        $arrayCheckAlphasSender[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayCheckAlphasSender[2] = "كلمة المرور غير صحيحه";

//الرسائل الناتجه من دالة طلب إسم المرسل - الأحرف الهجائية
        $arrayAddAlphaSender = array();
        $arrayAddAlphaSender[0] = "لم يتم الاتصال بالخادم";
        $arrayAddAlphaSender[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayAddAlphaSender[2] = "كلمة المرور غير صحيحه";
        $arrayAddAlphaSender[3] = "طول اسم المرسل المطلوب أكبر من 11 خانة";
        $arrayAddAlphaSender[4] = "تم إضافة الطلب بنجاح";

//الرسائل الناتجه من دالة طلب إسم المرسل - رقم الجوال
        $arrayAddSender = array();
        $arrayAddSender[0] = "لم يتم الاتصال بالخادم";
        $arrayAddSender[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayAddSender[2] = "كلمة المرور غير صحيحه";
        $arrayAddSender[3] = "إسم المرسل 'الرقم الدولي' غير صحيح";
        $arrayAddSender[4] = "إسم المرسل لا يحتاج إلى تفعيل ! ";
        $arrayAddSender[5] = "رصيدك غير كافي لإرسال كود التفعيل";
        $arrayAddSender[6] = "كلمة المرور غير صحيحه";

//الرسائل الناتجه من دالة التحقق من طلب تفعيل إسم المرسل - رقم جوال
        $arrayCheckSender = array();
        $arrayCheckSender[0] = "اسم المرسل غير مفعل";
        $arrayCheckSender[1] = "إسم المرسل مفعل";
        $arrayCheckSender[2] = "إسم المرسل مرفوض";
        $arrayCheckSender[3] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayCheckSender[4] = "كلمة المرور غير صحيحه";
        $arrayCheckSender[5] = "senderId خاطئ";

//الرسائل الناتجه من دالة تفعيل طلب إسم المرسل - رقم جوال
        $arrayActiveSender = array();
        $arrayActiveSender[0] = "لم يتم الاتصال بالخادم";
        $arrayActiveSender[1] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arrayActiveSender[2] = "كلمة المرور غير صحيحه";
        $arrayActiveSender[3] = "تم تفعيل إسم المرسل";
        $arrayActiveSender[4] = "كود التفعيل غير صحيح";
        $arrayActiveSender[5] = "senderId خاطئ";

//الرسائل الناتجه من دالة قالب الإرسال
        $arraySendMsgWK = array();
        $arraySendMsgWK[0] = "لم يتم الاتصال بالخادم";
        $arraySendMsgWK[1] = "تمت عملية الإرسال بنجاح";
        $arraySendMsgWK[2] = "رصيدك 0 , الرجاء إعادة التعبئة حتى تتمكن من إرسال الرسائل";
        $arraySendMsgWK[3] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arraySendMsgWK[4] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arraySendMsgWK[5] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arraySendMsgWK[6] = "صفحة الانترنت غير فعالة , حاول الارسال من جديد";
        $arraySendMsgWK[7] = "نظام المدارس غير فعال";
        $arraySendMsgWK[8] = "تكرار رمز المدرسة لنفس المستخدم";
        $arraySendMsgWK[9] = "انتهاء الفترة التجريبية";
        $arraySendMsgWK[10] = "عدد الارقام لا يساوي عدد الرسائل";
        $arraySendMsgWK[11] = "اشتراكك لا يتيح لك ارسال رسائل لهذه المدرسة. يجب عليك تفعيل الاشتراك لهذه المدرسة";
        $arraySendMsgWK[12] = "إصدار البوابة غير صحيح";
        $arraySendMsgWK[13] = "الرقم المرسل به غير مفعل أو لا يوجد الرمز BS في نهاية الرسالة";
        $arraySendMsgWK[14] = "غير مصرح لك بالإرسال بإستخدام هذا المرسل";
        $arraySendMsgWK[15] = "الأرقام المرسل لها غير موجوده أو غير صحيحه";
        $arraySendMsgWK[16] = "إسم المرسل فارغ، أو غير صحيح";
        $arraySendMsgWK[17] = "نص الرسالة غير متوفر أو غير مشفر بشكل صحيح";
        $arraySendMsgWK[18] = "تم ايقاف الارسال من المزود";
        $arraySendMsgWK[19] = "لم يتم العثور على مفتاح نوع التطبيق";
    }
}
