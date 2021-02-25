<?php

namespace Domain\Vendor;

use DateTimeInterface;

interface VendorRepositoryInterface
{
    /**
     * @return Vendor[]
     */
    public function findVendors(DateTimeInterface $deliveryDate, int $headCount, string $search): array;
}
