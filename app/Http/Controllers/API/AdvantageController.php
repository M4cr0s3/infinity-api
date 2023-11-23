<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvantageCollection;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvantageController extends Controller
{
    public function getAdvantages(): AdvantageCollection
    {
        return new AdvantageCollection(Advantage::query()->get());
    }
}
