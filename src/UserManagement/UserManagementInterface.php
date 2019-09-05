<?php
namespace DaiDP\StsSDK\UserManagement;

/**
 * Interface UserManagementInterface
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
interface UserManagementInterface
{
    /**
     * Đăng ký user mới
     *
     * @param $data
     * @return mixed
     */
    public function register($data);

    /**
     * Đặt lại mật khẩu mới
     *
     * @param $phone
     * @param $password
     * @return mixed
     */
    public function resetPassword($phone, $password);

    /**
     * Đổi mật khẩu
     *
     * @param $phone
     * @param $oldPassword
     * @param $newPassword
     * @return mixed
     */
    public function changePassword($phone, $oldPassword, $newPassword);

    /**
     * Đăng nhập
     *
     * @param $phone
     * @param $password
     * @return mixed
     */
    public function login($phone, $password);

    /**
     * Refresh token
     *
     * @param $refreshToken
     * @return mixed
     */
    public function refreshToken($refreshToken);
}