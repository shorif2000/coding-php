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
     * @param DateTimeInterface $deliveryDate
     * @param int $headCount
     * @param string $phrase
     * @return Vendor[]
     */
    public function findVendors(DateTimeInterface $deliveryDate, int $headCount, string $phrase): array
    {
        $now = DateTimeUtils::now();

        return array_filter(
            $this->dataSource->getVendors(),
            function (Vendor $vendor) use ($deliveryDate, $now, $headCount, $phrase) {
                return $vendor->canDeliver($deliveryDate, $now) && $vendor->maxHeadcount($headCount) && $vendor->matchPhrase($phrase);
            }
        );
    }
}
