<?php


function generateHeaderHTML($data, $system, $route)
{
    echo '<div class="container-fluid">';
    echo '    <div class="d-flex flex-column mt-2">';
    echo '        <div class="d-flex align-items-center align-items-lg-center">';
    echo '            <span class="d-md-flex align-items-md-center me-5">';
    echo '                <i class="' . $data['icon'] . ' fs-1 me-2 text-primary"></i>';
    echo '                <span class="fs-4 fw-bold text-primary">' . $data['title'] . '</span>';
    echo '            </span>';
    echo '            <ol class="breadcrumb text-primary mt-3">';

    // Check if 'list' exists and is an array before looping
    if (isset($data['list']) && is_array($data['list'])) {
        foreach ($data['list'] as $item) {
            $activeClass = $item['active'] ? 'active' : '';
            echo '                <li class="breadcrumb-item ' . $activeClass . '">';
            echo (!$item['active'] ? "<a href='?s=" . $system . "&p=.$route.'>" : "");
            echo '                    <span>' . $item['data'] . '</span>';
            echo (!$item['active'] ? "</a>" : "");

            echo '                </li>';
        }
    }

    echo '            </ol>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
}
