<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="User API",
 *     version="1.0.0",
 *     description="API documentation for User management"
 * )
 */
class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     summary="新しいユーザーを作成",
     *     description="バリデーションされたデータを使用して新しいユーザーを作成し、作成されたユーザーの情報をJSON形式で返します。",
     *     operationId="createUser",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string", example="John Doe", description="ユーザーの名前"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com", description="ユーザーのメールアドレス"),
     *             @OA\Property(property="password", type="string", format="password", example="password123", description="ユーザーのパスワード")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="ユーザー作成成功",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1, description="作成されたユーザーのID"),
     *             @OA\Property(property="name", type="string", example="John Doe", description="作成されたユーザーの名前"),
     *             @OA\Property(property="email", type="string", example="john@example.com", description="作成されたユーザーのメールアドレス"),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2023-10-15T13:45:00Z", description="作成日時"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2023-10-15T13:45:00Z", description="更新日時")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="バリデーションエラー",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Validation error")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="サーバーエラー"
     *     )
     * )
     */
    public function store(StoreUserRequest $request)
    {
        // バリデーションされたデータを受け取る
        $validated = $request->validated();

        // ユーザーを作成
        $user = $this->userService->createUser($validated);

        // JSON形式でレスポンスを返す
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
