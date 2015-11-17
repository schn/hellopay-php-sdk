<?php
/**
 * Copyright 2015 HELLOPAY SINGAPORE PTE. LTD.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * helloPay.
 *
 * As with any software that integrates with the helloPay platform, your use
 * of this software is subject to the helloPay Developer Principles and
 * Policies [https://www.hellopay.com.sg/privacy-policy.html]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace HelloPay;

/**
 * Class HelloPayResponse
 *
 * @package HelloPay
 */
abstract class HelloPayResponse
{
    /**
     * @var string
     */
    protected $success;

    /**
     * @var string
     */
    protected $message;

    /**
     * @return bool
     */
    public function getSuccess()
    {
        return (bool) $this->success;
    }

    /**
     * @param string $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
