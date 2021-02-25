<?php

namespace App\Controllers;

use App\Request;
use Domain\Vendor\Vendor;
use Domain\Vendor\VendorRepositoryInterface;
use Utils\DateTimeUtils;
use Utils\Validator;

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
        $headCount = $request->get(2);
        Validator::validateInputNumber($headCount,'/^[0-9]+$/');
        $phrase = $request->get(3);
        Validator::validateInputString($phrase,'/^[A-z0-9-_]+$/i');
        $vendors = $this->vendorRepository->findVendors($deliveryDate, (int) $headCount, $phrase);
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
