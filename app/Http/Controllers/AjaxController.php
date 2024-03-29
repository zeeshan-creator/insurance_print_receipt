<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function userCount()
    {
        $currentYear = date("Y");

        // this will return records from jan to dec of current year;
        $userCount = DB::select("SELECT count(id) AS 'Count'  from users  WHERE  (created_at) BETWEEN '" . $currentYear . "-01-01' AND '" . $currentYear . "-12-31' GROUP BY YEAR(created_at), MONTH(created_at)");

        return $userCount;
    }

    public function adminCount()
    {
        $currentYear = date("Y");

        // this will return records from jan to dec of current year;
        $adminCount = DB::select("SELECT count(id) AS 'Count'  from admins WHERE (created_at) BETWEEN '" . $currentYear . "-01-01' AND '" . $currentYear . "-12-31' GROUP BY YEAR(created_at), MONTH(created_at)");

        return $adminCount;
    }

    public function customerCount()
    {
        $currentYear = date("Y");

        // this will return records from jan to dec of current year;
        $adminCount = DB::select("SELECT count(id) AS 'Count'  from customers WHERE (created_at) BETWEEN '" . $currentYear . "-01-01' AND '" . $currentYear . "-12-31' GROUP BY YEAR(created_at), MONTH(created_at)");

        return $adminCount;
    }
}
