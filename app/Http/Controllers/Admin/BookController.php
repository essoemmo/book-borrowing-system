<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Traits\ResponseTrait;

class BookController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('books', true, true, true, true);
    }

    public function index(BookDataTable $users)
    {
        return $users->render('admin.books.index');
    }
}
