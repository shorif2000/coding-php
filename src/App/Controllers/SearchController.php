<?php

namespace App\Controllers;

use App\Request;
use Domain\Vendor\Vendor;
use Domain\Vendor\VendorRepositoryInterface;

class SearchController implements Controller
{
    private VendorRepositoryInterface $vendorRepository;

    public function __construct(
        VendorRepositoryInterface $vendorRepository
    )
    {
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * @return string[]
     */
    public function searchVendors(Request $request): array
    {
        // $vendors = $this->vendorRepository->findVendors(...);
        // return $this->buildResponse($vendors);
    }

    /**
     * @param Vendor[] $vendors
     * @return string[]
     */
    private function buildResponse(array $vendors): array
    {
        $response = [];
        foreach ($vendors as $vendor) {
            $response[] = $vendor->getHeader().': '.$vendor->getMenu();
        }
        return $response;
    }
}
