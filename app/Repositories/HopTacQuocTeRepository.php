<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\HopTacQuocTeRepositoryInterface;
use Illuminate\Support\Facades\DB;
class HopTacQuocTeRepository extends BaseRepository implements HopTacQuocTeRepositoryInterface
{

    public function getTable()
    {
        return 'ket_qua_hop_tac_quoc_te';
    }

    /* Danh sách kết quả hợp tác quốc tế.
     * @author: phucnv
     * @created_at 2020-06-15
     */
    public function getDanhSachKetQuaHopTacQuocTe($params){

       
        $queryBuilder = $this->table
        ->leftjoin('co_so_dao_tao', 'ket_qua_hop_tac_quoc_te.co_so_id', '=', 'co_so_dao_tao.id')
        ->select('ket_qua_hop_tac_quoc_te.*', DB::raw('co_so_dao_tao.ten as ten'));

        if(isset($params['co_so_id']) && $params['co_so_id'] != null){
            $queryBuilder->where('ket_qua_hop_tac_quoc_te.co_so_id', $params['co_so_id']);
        }
        if(isset($params['nam']) && $params['nam'] != null){
            $queryBuilder->where('ket_qua_hop_tac_quoc_te.nam', $params['nam']);
        }

        if(isset($params['dot']) && $params['dot'] != null){
            $queryBuilder->where('ket_qua_hop_tac_quoc_te.dot', $params['dot']);
        }

        return $queryBuilder->orderBy('nam', 'desc')->paginate($params['page_size']);
      
    }

    /* Kiểm tra sự tồn tại của bản ghi đã có 4 trường co_so_id, nam, dot.
     * @author: phucnv
     * @created_at 2020-06-15
     */
    public function checkTonTaiKhiThem($params){
        $kq = $this->table
        ->where('ket_qua_hop_tac_quoc_te.co_so_id', $params['co_so_id'])
        ->where('ket_qua_hop_tac_quoc_te.nam', $params['nam'])
        ->where('ket_qua_hop_tac_quoc_te.dot', $params['dot'])
        ->select('ket_qua_hop_tac_quoc_te.*')
        ->first();

        return $kq;
    }

    /* Danh sách chi tiết đội ngũ nhà giáo theo cơ sở.
     * @author: phucnv
     * @created_at 2020-06-15 
     */
    public function chiTietTheoCoSo($co_so_id, $params){
        $queryBuilder = $this->table
        ->leftjoin('co_so_dao_tao','so_lieu_doi_ngu_nha_giao.co_so_id','=','co_so_dao_tao.id')
        ->select('so_lieu_doi_ngu_nha_giao.*',
        DB::raw('co_so_dao_tao.ten as ten_co_so'))
        ->where('ket_qua_hop_tac_quoc_te.co_so_id', $co_so_id);

        if(isset($params['nam']) && $params['nam'] != null){
            $queryBuilder->where('so_lieu_doi_ngu_nha_giao.nam', $params['nam']);
        }
        if(isset($params['dot']) && $params['dot'] != null){
            $queryBuilder->where('so_lieu_doi_ngu_nha_giao.dot', $params['dot']);
        }
        
        return $queryBuilder->paginate($params['page_size']);
    }
  
}
