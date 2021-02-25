<?php

namespace Domain\Vendor;

use DateTimeInterface;
use Utils\DateTimeUtils;

class HardcodedVendorRepository implements VendorRepositoryInterface
{
    private VendorDataSourceInterface $dataSource;

    public function __construct(
        VendorDataSourceInterface $dataSource
    )
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return Vendor[]
     */
    public function findVendors(DateTimeInterface $deliveryDate): array
    {
        $now = DateTimeUtils::now();

        $availableVendors = array_filter(
            $this->dataSource->getVendors(),
            function (Vendor $vendor) use ($deliveryDate, $now) {
                return $vendor->canDeliver($deliveryDate, $now);
            }
        );
        return $availableVendors;
    }
}
