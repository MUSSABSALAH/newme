<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

/**
 * Walim could not be reached or refused the request. The message is safe to
 * show to staff.
 */
final class WalimException extends \RuntimeException {}
