<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php 

      $selectcat = $_GET['c'];
      $selectv = $_GET['v'];
      $selectvg = $_GET['vg'];
      $selectgf = $_GET['gf'];
      $url = $_SERVER['REQUEST_URI']; //returns the current URL
      $parts = explode('/',$url);
      $dir = $_SERVER['SERVER_NAME'];
    
      end($parts);
      $dircompany = prev($parts); 
      $dircompany = urldecode($dircompany);

      echo $dircompany;
      ?></title>
    <link rel="icon" href="am.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
      .text-dark{
        color: #2B2B2B !important;
      }
      .bg-dark{
        background: #2B2B2B !important;
      }


      .disable-caret::after{
        display: none !important;
      }

      .filter .dropdown{
        position: static !important;
      }
      .filter .dropdown-menu{
        text-align: center;
        width: 100%;
        border-radius: 0 !important;
        border: 0 !important;
        left: 0 !important;
        right: 0 !important;
        transform: translate3d(0, 136px, 0px) !important;
        border-bottom: 2px solid rgba(0, 0, 0, 1) !important;
      }
      .filter .dropdown-menu li{
        margin-right: 2px !important;
        margin-left: 2px !important;
      }

      footer{
        margin-top: 40px;
      }

      .ls-1 {
        letter-spacing: 1px; }

      .ls-2 {
        letter-spacing: 2px; }

      .ls-3 {
        letter-spacing: 3px; }

      .ls-4 {
        letter-spacing: 4px; }

      .ls-5 {
        letter-spacing: 5px; }

      .ls-6 {
        letter-spacing: 6px; }

      .ls-7 {
        letter-spacing: 7px; }

      .ls-8 {
        letter-spacing: 8px; }

      .ls-9 {
        letter-spacing: 9px; }

      .ls-10 {
        letter-spacing: 10px; }

      .ls-11 {
        letter-spacing: 11px; }

      .ls-12 {
        letter-spacing: 12px; }

      .ls-13 {
        letter-spacing: 13px; }

      .ls-14 {
        letter-spacing: 14px; }

      .ls-15 {
        letter-spacing: 15px; }

      .ls-16 {
        letter-spacing: 16px; }

      .ls-17 {
        letter-spacing: 17px; }

      .ls-18 {
        letter-spacing: 18px; }

      .ls-19 {
        letter-spacing: 19px; }

      .ls-20 {
        letter-spacing: 20px; }

      .ls-21 {
        letter-spacing: 21px; }

      .ls-22 {
        letter-spacing: 22px; }

      .ls-23 {
        letter-spacing: 23px; }

      .ls-24 {
        letter-spacing: 24px; }

      .ls-25 {
        letter-spacing: 25px; }

      .ls-26 {
        letter-spacing: 26px; }

      .ls-27 {
        letter-spacing: 27px; }

      .ls-28 {
        letter-spacing: 28px; }

      .ls-29 {
        letter-spacing: 29px; }

      .ls-30 {
        letter-spacing: 30px; }

      .ls-31 {
        letter-spacing: 31px; }

      .ls-32 {
        letter-spacing: 32px; }

      .ls-33 {
        letter-spacing: 33px; }

      .ls-34 {
        letter-spacing: 34px; }

      .ls-35 {
        letter-spacing: 35px; }

      .ls-36 {
        letter-spacing: 36px; }

      .ls-37 {
        letter-spacing: 37px; }

      .ls-38 {
        letter-spacing: 38px; }

      .ls-39 {
        letter-spacing: 39px; }

      .ls-40 {
        letter-spacing: 40px; }

      .ls-41 {
        letter-spacing: 41px; }

      .ls-42 {
        letter-spacing: 42px; }

      .ls-43 {
        letter-spacing: 43px; }

      .ls-44 {
        letter-spacing: 44px; }

      .ls-45 {
        letter-spacing: 45px; }

      .ls-46 {
        letter-spacing: 46px; }

      .ls-47 {
        letter-spacing: 47px; }

      .ls-48 {
        letter-spacing: 48px; }

      .ls-49 {
        letter-spacing: 49px; }

      .ls-50 {
        letter-spacing: 50px; }

      .ls-51 {
        letter-spacing: 51px; }

      .ls-52 {
        letter-spacing: 52px; }

      .ls-53 {
        letter-spacing: 53px; }

      .ls-54 {
        letter-spacing: 54px; }

      .ls-55 {
        letter-spacing: 55px; }

      .ls-56 {
        letter-spacing: 56px; }

      .ls-57 {
        letter-spacing: 57px; }

      .ls-58 {
        letter-spacing: 58px; }

      .ls-59 {
        letter-spacing: 59px; }

      .ls-60 {
        letter-spacing: 60px; }

      .ls-61 {
        letter-spacing: 61px; }

      .ls-62 {
        letter-spacing: 62px; }

      .ls-63 {
        letter-spacing: 63px; }

      .ls-64 {
        letter-spacing: 64px; }

      .ls-65 {
        letter-spacing: 65px; }

      .ls-66 {
        letter-spacing: 66px; }

      .ls-67 {
        letter-spacing: 67px; }

      .ls-68 {
        letter-spacing: 68px; }

      .ls-69 {
        letter-spacing: 69px; }

      .ls-70 {
        letter-spacing: 70px; }

      .ls-71 {
        letter-spacing: 71px; }

      .ls-72 {
        letter-spacing: 72px; }

      .ls-73 {
        letter-spacing: 73px; }

      .ls-74 {
        letter-spacing: 74px; }

      .ls-75 {
        letter-spacing: 75px; }

      .ls-76 {
        letter-spacing: 76px; }

      .ls-77 {
        letter-spacing: 77px; }

      .ls-78 {
        letter-spacing: 78px; }

      .ls-79 {
        letter-spacing: 79px; }

      .ls-80 {
        letter-spacing: 80px; }

      .ls-81 {
        letter-spacing: 81px; }

      .ls-82 {
        letter-spacing: 82px; }

      .ls-83 {
        letter-spacing: 83px; }

      .ls-84 {
        letter-spacing: 84px; }

      .ls-85 {
        letter-spacing: 85px; }

      .ls-86 {
        letter-spacing: 86px; }

      .ls-87 {
        letter-spacing: 87px; }

      .ls-88 {
        letter-spacing: 88px; }

      .ls-89 {
        letter-spacing: 89px; }

      .ls-90 {
        letter-spacing: 90px; }

      .lh-1 {
        line-height: 1px; }

      .lh-2 {
        line-height: 2px; }

      .lh-3 {
        line-height: 3px; }

      .lh-4 {
        line-height: 4px; }

      .lh-5 {
        line-height: 5px; }

      .lh-6 {
        line-height: 6px; }

      .lh-7 {
        line-height: 7px; }

      .lh-8 {
        line-height: 8px; }

      .lh-9 {
        line-height: 9px; }

      .lh-10 {
        line-height: 10px; }

      .lh-11 {
        line-height: 11px; }

      .lh-12 {
        line-height: 12px; }

      .lh-13 {
        line-height: 13px; }

      .lh-14 {
        line-height: 14px; }

      .lh-15 {
        line-height: 15px; }

      .lh-16 {
        line-height: 16px; }

      .lh-17 {
        line-height: 17px; }

      .lh-18 {
        line-height: 18px; }

      .lh-19 {
        line-height: 19px; }

      .lh-20 {
        line-height: 20px; }

      .lh-21 {
        line-height: 21px; }

      .lh-22 {
        line-height: 22px; }

      .lh-23 {
        line-height: 23px; }

      .lh-24 {
        line-height: 24px; }

      .lh-25 {
        line-height: 25px; }

      .lh-26 {
        line-height: 26px; }

      .lh-27 {
        line-height: 27px; }

      .lh-28 {
        line-height: 28px; }

      .lh-29 {
        line-height: 29px; }

      .lh-30 {
        line-height: 30px; }

      .lh-31 {
        line-height: 31px; }

      .lh-32 {
        line-height: 32px; }

      .lh-33 {
        line-height: 33px; }

      .lh-34 {
        line-height: 34px; }

      .lh-35 {
        line-height: 35px; }

      .lh-36 {
        line-height: 36px; }

      .lh-37 {
        line-height: 37px; }

      .lh-38 {
        line-height: 38px; }

      .lh-39 {
        line-height: 39px; }

      .lh-40 {
        line-height: 40px; }

      .lh-41 {
        line-height: 41px; }

      .lh-42 {
        line-height: 42px; }

      .lh-43 {
        line-height: 43px; }

      .lh-44 {
        line-height: 44px; }

      .lh-45 {
        line-height: 45px; }

      .lh-46 {
        line-height: 46px; }

      .lh-47 {
        line-height: 47px; }

      .lh-48 {
        line-height: 48px; }

      .lh-49 {
        line-height: 49px; }

      .lh-50 {
        line-height: 50px; }

      .lh-51 {
        line-height: 51px; }

      .lh-52 {
        line-height: 52px; }

      .lh-53 {
        line-height: 53px; }

      .lh-54 {
        line-height: 54px; }

      .lh-55 {
        line-height: 55px; }

      .lh-56 {
        line-height: 56px; }

      .lh-57 {
        line-height: 57px; }

      .lh-58 {
        line-height: 58px; }

      .lh-59 {
        line-height: 59px; }

      .lh-60 {
        line-height: 60px; }

      .lh-61 {
        line-height: 61px; }

      .lh-62 {
        line-height: 62px; }

      .lh-63 {
        line-height: 63px; }

      .lh-64 {
        line-height: 64px; }

      .lh-65 {
        line-height: 65px; }

      .lh-66 {
        line-height: 66px; }

      .lh-67 {
        line-height: 67px; }

      .lh-68 {
        line-height: 68px; }

      .lh-69 {
        line-height: 69px; }

      .lh-70 {
        line-height: 70px; }

      .lh-71 {
        line-height: 71px; }

      .lh-72 {
        line-height: 72px; }

      .lh-73 {
        line-height: 73px; }

      .lh-74 {
        line-height: 74px; }

      .lh-75 {
        line-height: 75px; }

      .lh-76 {
        line-height: 76px; }

      .lh-77 {
        line-height: 77px; }

      .lh-78 {
        line-height: 78px; }

      .lh-79 {
        line-height: 79px; }

      .lh-80 {
        line-height: 80px; }

      .lh-81 {
        line-height: 81px; }

      .lh-82 {
        line-height: 82px; }

      .lh-83 {
        line-height: 83px; }

      .lh-84 {
        line-height: 84px; }

      .lh-85 {
        line-height: 85px; }

      .lh-86 {
        line-height: 86px; }

      .lh-87 {
        line-height: 87px; }

      .lh-88 {
        line-height: 88px; }

      .lh-89 {
        line-height: 89px; }

      .lh-90 {
        line-height: 90px; }

      /* Font weights */
      .fw-1 {
        font-weight: 100 !important; }

      .fw-2 {
        font-weight: 200 !important; }

      .fw-3 {
        font-weight: 300 !important; }

      .fw-4 {
        font-weight: 400 !important; }

      .fw-5 {
        font-weight: 500 !important; }

      .fw-6 {
        font-weight: 600 !important; }

      .fw-7 {
        font-weight: 700 !important; }

      .fw-8 {
        font-weight: 800 !important; }

      .fw-9 {
        font-weight: 900 !important; }

      /* font Sizes */
      .fz-1 {
        font-size: 0.0625rem; }

      .fz-2 {
        font-size: 0.125rem; }

      .fz-3 {
        font-size: 0.1875rem; }

      .fz-4 {
        font-size: 0.25rem; }

      .fz-5 {
        font-size: 0.3125rem; }

      .fz-6 {
        font-size: 0.375rem; }

      .fz-7 {
        font-size: 0.4375rem; }

      .fz-8 {
        font-size: 0.5rem; }

      .fz-9 {
        font-size: 0.5625rem; }

      .fz-10 {
        font-size: 0.625rem; }

      .fz-11 {
        font-size: 0.6875rem; }

      .fz-12 {
        font-size: 0.75rem; }

      .fz-13 {
        font-size: 0.8125rem; }

      .fz-14 {
        font-size: 0.875rem; }

      .fz-15 {
        font-size: 0.9375rem; }

      .fz-16 {
        font-size: 1rem; }

      .fz-17 {
        font-size: 1.0625rem; }

      .fz-18 {
        font-size: 1.125rem; }

      .fz-19 {
        font-size: 1.1875rem; }

      .fz-20 {
        font-size: 1.25rem; }

      .fz-21 {
        font-size: 1.3125rem; }

      .fz-22 {
        font-size: 1.375rem; }

      .fz-23 {
        font-size: 1.4375rem; }

      .fz-24 {
        font-size: 1.5rem; }

      .fz-25 {
        font-size: 1.5625rem; }

      .fz-26 {
        font-size: 1.625rem; }

      .fz-27 {
        font-size: 1.6875rem; }

      .fz-28 {
        font-size: 1.75rem; }

      .fz-29 {
        font-size: 1.8125rem; }

      .fz-30 {
        font-size: 1.875rem; }

      .fz-31 {
        font-size: 1.9375rem; }

      .fz-32 {
        font-size: 2rem; }

      .fz-33 {
        font-size: 2.0625rem; }

      .fz-34 {
        font-size: 2.125rem; }

      .fz-35 {
        font-size: 2.1875rem; }

      .fz-36 {
        font-size: 2.25rem; }

      .fz-37 {
        font-size: 2.3125rem; }

      .fz-38 {
        font-size: 2.375rem; }

      .fz-39 {
        font-size: 2.4375rem; }

      .fz-40 {
        font-size: 2.5rem; }

      .fz-41 {
        font-size: 2.5625rem; }
        @media (max-width: 575px) {
          .fz-41 {
            font-size: 2rem; } }

      .fz-42 {
        font-size: 2.625rem; }
        @media (max-width: 575px) {
          .fz-42 {
            font-size: 2rem; } }

      .fz-43 {
        font-size: 2.6875rem; }
        @media (max-width: 575px) {
          .fz-43 {
            font-size: 2rem; } }

      .fz-44 {
        font-size: 2.75rem; }
        @media (max-width: 575px) {
          .fz-44 {
            font-size: 2rem; } }

      .fz-45 {
        font-size: 2.8125rem; }
        @media (max-width: 575px) {
          .fz-45 {
            font-size: 2rem; } }

      .fz-46 {
        font-size: 2.875rem; }
        @media (max-width: 575px) {
          .fz-46 {
            font-size: 2rem; } }

      .fz-47 {
        font-size: 2.9375rem; }
        @media (max-width: 575px) {
          .fz-47 {
            font-size: 2rem; } }

      .fz-48 {
        font-size: 3rem; }
        @media (max-width: 575px) {
          .fz-48 {
            font-size: 2rem; } }

      .fz-49 {
        font-size: 3.0625rem; }
        @media (max-width: 575px) {
          .fz-49 {
            font-size: 2rem; } }

      .fz-50 {
        font-size: 3.125rem; }
        @media (max-width: 575px) {
          .fz-50 {
            font-size: 2rem; } }

      .fz-51 {
        font-size: 3.1875rem; }
        @media (max-width: 575px) {
          .fz-51 {
            font-size: 2rem; } }

      .fz-52 {
        font-size: 3.25rem; }
        @media (max-width: 575px) {
          .fz-52 {
            font-size: 2rem; } }

      .fz-53 {
        font-size: 3.3125rem; }
        @media (max-width: 575px) {
          .fz-53 {
            font-size: 2rem; } }

      .fz-54 {
        font-size: 3.375rem; }
        @media (max-width: 575px) {
          .fz-54 {
            font-size: 2rem; } }

      .fz-55 {
        font-size: 3.4375rem; }
        @media (max-width: 575px) {
          .fz-55 {
            font-size: 2rem; } }

      .fz-56 {
        font-size: 3.5rem; }
        @media (max-width: 575px) {
          .fz-56 {
            font-size: 2rem; } }

      .fz-57 {
        font-size: 3.5625rem; }
        @media (max-width: 575px) {
          .fz-57 {
            font-size: 2rem; } }

      .fz-58 {
        font-size: 3.625rem; }
        @media (max-width: 575px) {
          .fz-58 {
            font-size: 2rem; } }

      .fz-59 {
        font-size: 3.6875rem; }
        @media (max-width: 575px) {
          .fz-59 {
            font-size: 2rem; } }

      .fz-60 {
        font-size: 3.75rem; }
        @media (max-width: 575px) {
          .fz-60 {
            font-size: 2rem; } }

      .fz-61 {
        font-size: 3.8125rem; }
        @media (max-width: 768px) {
          .fz-61 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-61 {
            font-size: 2rem; } }

      .fz-62 {
        font-size: 3.875rem; }
        @media (max-width: 768px) {
          .fz-62 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-62 {
            font-size: 2rem; } }

      .fz-63 {
        font-size: 3.9375rem; }
        @media (max-width: 768px) {
          .fz-63 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-63 {
            font-size: 2rem; } }

      .fz-64 {
        font-size: 4rem; }
        @media (max-width: 768px) {
          .fz-64 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-64 {
            font-size: 2rem; } }

      .fz-65 {
        font-size: 4.0625rem; }
        @media (max-width: 768px) {
          .fz-65 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-65 {
            font-size: 2rem; } }

      .fz-66 {
        font-size: 4.125rem; }
        @media (max-width: 768px) {
          .fz-66 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-66 {
            font-size: 2rem; } }

      .fz-67 {
        font-size: 4.1875rem; }
        @media (max-width: 768px) {
          .fz-67 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-67 {
            font-size: 2rem; } }

      .fz-68 {
        font-size: 4.25rem; }
        @media (max-width: 768px) {
          .fz-68 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-68 {
            font-size: 2rem; } }

      .fz-69 {
        font-size: 4.3125rem; }
        @media (max-width: 768px) {
          .fz-69 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-69 {
            font-size: 2rem; } }

      .fz-70 {
        font-size: 4.375rem; }
        @media (max-width: 768px) {
          .fz-70 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-70 {
            font-size: 2rem; } }

      .fz-71 {
        font-size: 4.4375rem; }
        @media (max-width: 768px) {
          .fz-71 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-71 {
            font-size: 2rem; } }

      .fz-72 {
        font-size: 4.5rem; }
        @media (max-width: 768px) {
          .fz-72 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-72 {
            font-size: 2rem; } }

      .fz-73 {
        font-size: 4.5625rem; }
        @media (max-width: 768px) {
          .fz-73 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-73 {
            font-size: 2rem; } }

      .fz-74 {
        font-size: 4.625rem; }
        @media (max-width: 768px) {
          .fz-74 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-74 {
            font-size: 2rem; } }

      .fz-75 {
        font-size: 4.6875rem; }
        @media (max-width: 768px) {
          .fz-75 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-75 {
            font-size: 2rem; } }

      .fz-76 {
        font-size: 4.75rem; }
        @media (max-width: 768px) {
          .fz-76 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-76 {
            font-size: 2rem; } }

      .fz-77 {
        font-size: 4.8125rem; }
        @media (max-width: 768px) {
          .fz-77 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-77 {
            font-size: 2rem; } }

      .fz-78 {
        font-size: 4.875rem; }
        @media (max-width: 768px) {
          .fz-78 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-78 {
            font-size: 2rem; } }

      .fz-79 {
        font-size: 4.9375rem; }
        @media (max-width: 768px) {
          .fz-79 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-79 {
            font-size: 2rem; } }

      .fz-80 {
        font-size: 5rem; }
        @media (max-width: 768px) {
          .fz-80 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-80 {
            font-size: 2rem; } }

      .fz-81 {
        font-size: 5.0625rem; }
        @media (max-width: 768px) {
          .fz-81 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-81 {
            font-size: 2rem; } }

      .fz-82 {
        font-size: 5.125rem; }
        @media (max-width: 768px) {
          .fz-82 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-82 {
            font-size: 2rem; } }

      .fz-83 {
        font-size: 5.1875rem; }
        @media (max-width: 768px) {
          .fz-83 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-83 {
            font-size: 2rem; } }

      .fz-84 {
        font-size: 5.25rem; }
        @media (max-width: 768px) {
          .fz-84 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-84 {
            font-size: 2rem; } }

      .fz-85 {
        font-size: 5.3125rem; }
        @media (max-width: 768px) {
          .fz-85 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-85 {
            font-size: 2rem; } }

      .fz-86 {
        font-size: 5.375rem; }
        @media (max-width: 768px) {
          .fz-86 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-86 {
            font-size: 2rem; } }

      .fz-87 {
        font-size: 5.4375rem; }
        @media (max-width: 768px) {
          .fz-87 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-87 {
            font-size: 2rem; } }

      .fz-88 {
        font-size: 5.5rem; }
        @media (max-width: 768px) {
          .fz-88 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-88 {
            font-size: 2rem; } }

      .fz-89 {
        font-size: 5.5625rem; }
        @media (max-width: 768px) {
          .fz-89 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-89 {
            font-size: 2rem; } }

      .fz-90 {
        font-size: 5.625rem; }
        @media (max-width: 768px) {
          .fz-90 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-90 {
            font-size: 2rem; } }

      .fz-91 {
        font-size: 5.6875rem; }
        @media (max-width: 768px) {
          .fz-91 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-91 {
            font-size: 2rem; } }

      .fz-92 {
        font-size: 5.75rem; }
        @media (max-width: 768px) {
          .fz-92 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-92 {
            font-size: 2rem; } }

      .fz-93 {
        font-size: 5.8125rem; }
        @media (max-width: 768px) {
          .fz-93 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-93 {
            font-size: 2rem; } }

      .fz-94 {
        font-size: 5.875rem; }
        @media (max-width: 768px) {
          .fz-94 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-94 {
            font-size: 2rem; } }

      .fz-95 {
        font-size: 5.9375rem; }
        @media (max-width: 768px) {
          .fz-95 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-95 {
            font-size: 2rem; } }

      .fz-96 {
        font-size: 6rem; }
        @media (max-width: 768px) {
          .fz-96 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-96 {
            font-size: 2rem; } }

      .fz-97 {
        font-size: 6.0625rem; }
        @media (max-width: 768px) {
          .fz-97 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-97 {
            font-size: 2rem; } }

      .fz-98 {
        font-size: 6.125rem; }
        @media (max-width: 768px) {
          .fz-98 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-98 {
            font-size: 2rem; } }

      .fz-99 {
        font-size: 6.1875rem; }
        @media (max-width: 768px) {
          .fz-99 {
            font-size: 3rem; } }
        @media (max-width: 575px) {
          .fz-99 {
            font-size: 2rem; } }

      /* Borders */
      .bn {
        border: none; }

      .br-0 {
        border-radius: 0px !important; }

      .br-1 {
        border-radius: 1px !important; }

      .br-2 {
        border-radius: 2px !important; }

      .br-3 {
        border-radius: 3px !important; }

      .br-4 {
        border-radius: 4px !important; }

      .br-5 {
        border-radius: 5px !important; }

      .br-6 {
        border-radius: 6px !important; }

      .br-7 {
        border-radius: 7px !important; }

      .br-8 {
        border-radius: 8px !important; }

      .br-9 {
        border-radius: 9px !important; }

      .br-10 {
        border-radius: 10px !important; }

      .br-11 {
        border-radius: 11px !important; }

      .br-12 {
        border-radius: 12px !important; }

      .br-13 {
        border-radius: 13px !important; }

      .br-14 {
        border-radius: 14px !important; }

      .br-15 {
        border-radius: 15px !important; }

      .br-16 {
        border-radius: 16px !important; }

      .br-17 {
        border-radius: 17px !important; }

      .br-18 {
        border-radius: 18px !important; }

      .br-19 {
        border-radius: 19px !important; }

      .br-20 {
        border-radius: 20px !important; }

      .br-21 {
        border-radius: 21px !important; }

      .br-22 {
        border-radius: 22px !important; }

      .br-23 {
        border-radius: 23px !important; }

      .br-24 {
        border-radius: 24px !important; }

      .br-25 {
        border-radius: 25px !important; }

      .br-26 {
        border-radius: 26px !important; }

      .br-27 {
        border-radius: 27px !important; }

      .br-28 {
        border-radius: 28px !important; }

      .br-29 {
        border-radius: 29px !important; }

      .br-30 {
        border-radius: 30px !important; }

      .br-31 {
        border-radius: 31px !important; }

      .br-32 {
        border-radius: 32px !important; }

      .br-33 {
        border-radius: 33px !important; }

      .br-34 {
        border-radius: 34px !important; }

      .br-35 {
        border-radius: 35px !important; }

      .br-36 {
        border-radius: 36px !important; }

      .br-37 {
        border-radius: 37px !important; }

      .br-38 {
        border-radius: 38px !important; }

      .br-39 {
        border-radius: 39px !important; }

      .br-40 {
        border-radius: 40px !important; }

      .br-41 {
        border-radius: 41px !important; }

      .br-42 {
        border-radius: 42px !important; }

      .br-43 {
        border-radius: 43px !important; }

      .br-44 {
        border-radius: 44px !important; }

      .br-45 {
        border-radius: 45px !important; }

      .br-46 {
        border-radius: 46px !important; }

      .br-47 {
        border-radius: 47px !important; }

      .br-48 {
        border-radius: 48px !important; }

      .br-49 {
        border-radius: 49px !important; }

      .br-50 {
        border-radius: 50px !important; }

      /* Anchor Tags */
      .tdn {
        text-decoration: none !important; }

      .tdu {
        text-decoration: underline; }

      /* Postions */
      .posr {
        position: relative; }

      .posf {
        position: fixed; }

      .posa {
        position: absolute; }

      /* overflows */
      .oh {
        overflow: hidden; }

      .oxh {
        overflow-x: hidden; }

      .oyh {
        overflow-y: hidden; }

      .oxs {
        overflow-x: scroll; }

      .oys {
        overflow-y: scroll; }

    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8 col-lg-5 col-xl-3 p-0">
          <div class="d-flex justify-content-between py-3 px-3">
            <a href="#" class="tdn text-dark d-flex justify-content-center flex-column">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            <a href="#" class="tdn d-flex justify-content-center flex-column"><img src="../images/2.png" class="img-fluid" alt=""></a>
            <a href="#" class="tdn text-dark d-flex justify-content-center flex-column"><img src="img/envelope.png" class="img-fluid" alt=""></a>
          </div>
          <div class="bg-dark text-white text-center py-1">
            <p class="m-0 fz-30"><?php echo $dircompany; ?></p>
          </div>
          <div class="filter">
            <div class="filter-buttons d-flex justify-content-around bg-light py-1">
              <div class="dropdown">
                <button class="Cat btn br-0 btn-light px-2 disable-caret dropdown-toggle" type="button" data-toggle="dropdown">
                  Category
                </button>
                <div class="dropdown-menu p-3">
                  <ul class="list-inline list-unstyled">
                    <?php 
                    // Create connection
                    $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                    //$company = $_SESSION['company'];
                    $qz = "SELECT * FROM menu where company = \"$dircompany\"";
                    $result = mysqli_query($con,$qz);
                    $catagory = [];

                    while($row = mysqli_fetch_array($result))
                    {
                      if(!in_array ($row["catagory"], $catagory)){
                      array_push($catagory, $row['catagory']);
                      }
                    }
                    foreach($catagory as $c){
                      echo "
                      <li class=\"list-inline-item my-2\">
                        ";
                        if (isset($selectv)){
                          echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?v=1&c=$c\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">$c</a>";
                        }
                        else if (isset($selectvg)){
                          echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?vg=1&c=$c\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">$c</a>";
                        }
                        else if (isset($selectgf)){
                          echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?gf=1&c=$c\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">$c</a>";
                        }
                        else{
                          echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?c=$c\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">$c</a>";
                        }
                      echo "</li>";
                    }
                    echo "
                      <li class=\"list-inline-item my-2\">
                        ";
                      if (isset($selectv)){
                        echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?v=1\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">None</a>";
                      }
                      else if (isset($selectvg)){
                        echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?vg=1\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">None</a>";
                      }
                      else if (isset($selectgf)){
                        echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?gf=1\" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">None</a>";
                      }
                      else{
                        echo "<a href=\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . " \" class=\"btn btn-outline-dark py-1 px-3 fz-14 OPT\">None</a>";
                      }
                    echo "</li>";

                    mysqli_close($con);
                    ?>
                  </ul>
                </div>
              </div>
              <div class="dropdown">
                <button class="Die btn br-0 btn-light px-2 disable-caret dropdown-toggle" type="button" data-toggle="dropdown">
                  Dietary
                </button>
                <div class="dropdown-menu p-3">
                  <ul class="list-inline list-unstyled">
                    
                    <li class="list-inline-item my-2">
                      <a href=<?php echo "\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?v=1&c=$selectcat\"";?> class="btn btn-outline-dark py-1 px-3 fz-14">Vegitarian</a>
                    </li>
                    <li class="list-inline-item my-2">
                      <a href=<?php echo "\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?vg=1&c=$selectcat\"";?> class="btn btn-outline-dark py-1 px-3 fz-14">Vegan</a>
                    </li>
                    <li class="list-inline-item my-2">
                      <a href=<?php echo "\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?gf=1&c=$selectcat\"";?>" class="btn btn-outline-dark py-1 px-3 fz-14">Gluten Free</a>
                    </li>
                    <li class="list-inline-item my-2">
                      <a href=<?php echo "\"" . $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?c=$selectcat\"";?>" class="btn btn-outline-dark py-1 px-3 fz-14">None</a>
                    </li>
                    <!--p class="m-0 text-center">
                      <button class="btn btn-dark active py-1 px-4 fz-14">Save</button>
                    </p-->
                </div>
              </div>
              <div class="dropdown">
                <button class="Srt btn br-0 btn-light px-4 disable-caret dropdown-toggle" type="button" data-toggle="dropdown">
                  Sort
                </button>
                <div class="dropdown-menu p-3">
                  <ul class="list-inline list-unstyled">
                    <li class="list-inline-item my-2">
                      <a href="card-view.php" class="btn btn-outline-dark active py-1 px-3 fz-14">Card</a>
                    </li>
                    <li class="list-inline-item my-2">
                      <a href="index.php" class="btn btn-outline-dark py-1 px-3 fz-14">Grid</a>
                    </li>
                    <li class="list-inline-item my-2">
                      <a href="list-view.php" class="btn btn-outline-dark py-1 px-3 fz-14">List</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <?php 
                session_start();
                
                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                $qz = "SELECT * FROM menu WHERE company = \"$dircompany\"";
                $result = mysqli_query($con,$qz);
                

                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $catagory = $row['catagory'];
                    $fooddesc = $row['fooddesc'];
                    $price = $row['price'];
                    $v = $row['vegetarian'];
                    $vg = $row['vegan'];
                    $gf = $row['gf'];

                    $vget = $_GET['v'];
                    $vgget = $_GET['vg'];
                    $gfget = $_GET['gf'];

                    $extra1 = $row["extra1"];
                    $extraP1 = $row["extraP1"];
                    $extra2 = $row["extra2"];
                    $extraP2 = $row["extraP2"];
                    $extra3 = $row["extra3"];
                    $extraP3 = $row["extraP3"];
                    $extra4 = $row["extra4"];
                    $extraP4 = $row["extraP4"];
                    $extra5 = $row["extra5"];
                    $extraP5 = $row["extraP5"];
                    

                    $hide = $row['hide'];

                    $temphide = 0;

                    if (isset($vget) && $vget == 1){
                      if ($v == 0){
                        $temphide = 1;
                      }
                    }

                    if (isset($vgget) && $vgget == 1){
                      if ($vg == 0){
                        $temphide = 1;
                      }
                    }
                    
                    if (isset($gfget) && $gfget == 1){
                      if ($gf == 0){
                        $temphide = 1;
                      }
                    }
                    
                    if (isset($selectcat) && $catagory != $selectcat && $selectcat != ""){
                      $temphide = 1;
                    }
                    
                    if ($hide != 1 && $temphide != 1){
                      
                    echo "
                    <a href=\"#\" class=\"item mb-4 tdn d-block\">
                    <div class=\"row m-0\" id=\"$id\">
                      <div class=\"col-12 p-0\">
                        <img src=\"$image\" class=\"w-100\" alt=\"\">
                        <span class=\"txt text-dark p-3 d-block\">
                          <p class=\"m-0 font-weight-bold fz-16 d-flex justify-content-between\">
                            <span>$title</span>
                            <span class=\"fw-4\">$price</span>
                          </p>
                          <p class=\"m-0 fz-14 lh-16 py-3\">$fooddesc</p>";
                          if(isset($extra1)){
                            echo "<p class=\"m-0 text-muted fz-16 d-flex justify-content-between\">
                            <span>$extra1</span>
                            <span class=\"fw-4 text-dark\">$extraP1</span>
                          </p>";
                          }
                          if(isset($extra2)){
                            echo "<p class=\"m-0 text-muted fz-16 d-flex justify-content-between\">
                            <span>$extra2</span>
                            <span class=\"fw-4 text-dark\">$extraP2</span>
                          </p>";
                          }
                          if(isset($extra3)){
                            echo "<p class=\"m-0 text-muted fz-16 d-flex justify-content-between\">
                            <span>$extra3</span>
                            <span class=\"fw-4 text-dark\">$extraP3</span>
                          </p>";
                          }
                          if(isset($extra4)){
                            echo "<p class=\"m-0 text-muted fz-16 d-flex justify-content-between\">
                            <span>$extra4</span>
                            <span class=\"fw-4 text-dark\">$extraP4</span>
                          </p>";
                          }
                          if(isset($extra5)){
                            echo "<p class=\"m-0 text-muted fz-16 d-flex justify-content-between\">
                            <span>$extra5</span>
                            <span class=\"fw-4 text-dark\">$extraP5</span>
                          </p>";
                          }
                          echo "
                        </span>
                        
                      </div>
                    </div>
                  </a>";   
                }
              }
                
          ?>

          <footer class="bg-dark text-white">
            <p class="m-0 fz-13 py-3 text-center">Copyright Fohmoh Ltd © 2020. All rights reserved.</p>
          </footer>
        </div>
      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>