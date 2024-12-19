<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    // الحصول على بيانات المستخدم
    public function getUserData($id)
    {
        $userData = UserData::where('user_id', $id)->first();
        if (!$userData) {
            return response()->json(['message' => 'User data not found'], 404);
        }

        return response()->json(['data' => $userData]);
    }

    // تحديث بيانات المستخدم
    public function updateUserData(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'birth_place' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'record_number' => 'nullable|string',
            'residence_place' => 'nullable|string',
            'bio' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $userData = UserData::where('user_id', $id)->first();
        if (!$userData) {
            return response()->json(['message' => 'User data not found'], 404);
        }

        $userData->update($request->all());

        return response()->json(['data' => $userData]);
    }

    // إضافة بيانات جديدة للمستخدم
    public function addUserData(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'birth_place' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'record_number' => 'nullable|string',
            'residence_place' => 'nullable|string',
            'bio' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        // التأكد من عدم وجود بيانات سابقة
        $existingData = UserData::where('user_id', $id)->first();
        if ($existingData) {
            return response()->json(['message' => 'User data already exists'], 400);
        }

        // إنشاء بيانات جديدة
        $userData = UserData::create([
            'user_id' => $id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'record_number' => $request->record_number,
            'residence_place' => $request->residence_place,
            'bio' => $request->bio,
            'image_path' => $request->image_path,
        ]);

        return response()->json(['data' => $userData], 201);
    }
}
