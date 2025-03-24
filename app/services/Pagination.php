<?php

namespace app\services;

class Pagination
{
    public $totalItems;
    public $perPage;
    public $linksNum;

    public function __construct(int $totalItems, int $perPage = 12, int $linksNum = 7) 
    {
        $this->totalItems = $totalItems;
        $this->perPage = $perPage;
        $this->linksNum = $linksNum;
    }

    // Count total pages number
    public function countTotalPage(): int
    {
        return ceil($this->totalItems / $this->perPage);
    }

    // Get items per page
    public function getItemsPerPage(array $items, int $pageNum): array
    {
        return array_slice($items, $this->perPage * ($pageNum - 1), $this->perPage);
    }

    // Get pagination links
    public function getLinks(int $currentPage): array
    {
        $numsTotalPage = $this->countTotalPage();
        $startLink = max(($currentPage - ($this->linksNum - 1) / 2), 1);
        $endLink = min(($currentPage + ($this->linksNum - 1) / 2), $numsTotalPage);

        $links = [];
        if ($startLink > 1) {
            $links[] = [
                'page' => 1,
                'label' => '<<'
            ];
        }
        if ($currentPage > 1) {
            $links[] = [
                'page' => $currentPage - 1,
                'label' => '<'
            ];
        }
        for ($i = $startLink; $i <= $endLink; $i++) {
            $links[] = [
                'page' => $i,
                'label' => $i
            ];
        }
        if ($currentPage < $numsTotalPage) {
            $links[] = [
                'page' => $currentPage + 1,
                'label' => '>'
            ];
        }
        if ($endLink < $numsTotalPage) {
            $links[] = [
                'page' => $numsTotalPage,
                'label' => '>>'
            ];
        }

        return $links;
    }
}