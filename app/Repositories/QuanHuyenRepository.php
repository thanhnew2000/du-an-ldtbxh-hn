<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;

class QuanHuyenRepository extends BaseRepository implements QuanHuyenRepositoryInterface
{

    public function getTable()
    {
        return 'devvn_quanhuyen';
    }

    /* Lấy danh sách quận huyện
     * @author: thienth
     * @date: 2020-06-03
     * */
    public function getAll()
    {
        $queryBuilder = $this->table
            ->select(
                'devvn_quanhuyen.maqh as ma_quan_huyen',
                'devvn_quanhuyen.name as ten_quan_huyen'
            );
        return $queryBuilder->get();
    }
    public function getXaPhuongTheoQuanHuyen($id)
	{
		if($id==0){
			$data = DB::table('devvn_xaphuongthitran')
			->select('devvn_xaphuongthitran.xaid', 'devvn_xaphuongthitran.name')->get();
			return $data;
		}else{
			$data = DB::table('devvn_xaphuongthitran')
			->where('maqh', '=', $id)
			->select('devvn_xaphuongthitran.xaid', 'devvn_xaphuongthitran.name')->get();
			return $data;
		}
	}
}
