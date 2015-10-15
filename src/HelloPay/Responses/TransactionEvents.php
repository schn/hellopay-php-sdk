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

namespace HelloPay\Responses;

/**
 * Class TransactionEvents
 *
 * @package HelloPay
 */
class TransactionEvents extends Base
{
    const STATUS_CREATED = 'Created';

    const STATUS_COMMITTED = 'Committed';

    const STATUS_CANCELLED = 'Cancelled';

    const STATUS_COMPLETED = 'Completed';

    protected $currentItem;

    public function isCompleted()
    {
        return $this->checkStatus(static::STATUS_COMPLETED);
    }

    public function isCancelled()
    {
        return $this->checkStatus(static::STATUS_CANCELLED);
    }

    public function isCommitted()
    {
        return $this->checkStatus(static::STATUS_COMMITTED);
    }

    public function isCreated()
    {
        return $this->checkStatus(static::STATUS_CREATED);
    }

    public function getLastStatus()
    {
        if ($this->isCancelled()) {
            return static::STATUS_CANCELLED;
        }

        if ($this->isCompleted()) {
            return static::STATUS_COMPLETED;
        }

        if ($this->isCommitted()) {
            return static::STATUS_COMMITTED;
        }

        return static::STATUS_CREATED;
    }

    public function getLastItem()
    {
        return $this->currentItem;
    }

    /**
     * @param $status
     * @return bool
     */
    protected function checkStatus($status)
    {
        foreach ($this as $item) {
            if ($item['newStatus'] == $status) {
                $this->currentItem = $item;
                return true;
            }
        }

        return false;
    }
}
