<?php

namespace App\Controllers;

use App\Request;
use Domain\Vendor\Vendor;
use Domain\Vendor\VendorRepositoryInterface;
use Utils\DateTimeUtils;

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
     * @param Request $request
     * @return string[]
     * @throws \Exception
     */
    public function searchVendors(Request $request): array
    {
        $deliveryDate = DateTimeUtils::deliveryDate($request->get(0), $request->get(1));
        $headcount = (int) $request->get(2);
        $phrase = $request->get(3);
        $vendors = $this->vendorRepository->findVendors($deliveryDate, $headcount, $phrase);
        return $this->buildResponse($vendors);
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
