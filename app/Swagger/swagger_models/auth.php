<?php

/*
 * @OA\Post(
 *      path="/v1/auth/forgot-password",
 *      operationId="forgotPassword",
 *      tags={"auth"},
 *      summary="Forgot Password",
 *      description="Send forgot password request",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="johndoe@gmail.com"
 *                 ),
 *             )
 *         )
 *      ),
 *      @OA\Response(response=200, description="Successful operation"),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=401, description="Unauthorized"),
 *      @OA\Response(response=402, description="Payment Required"),
 * )
 */
