<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use App\Traits\AdminHelperTrait;
class SiteModel extends Model {

    use AdminHelperTrait,FeatureTrait,TermTrait,TagTrait,LogTrait,ActivityLogTrait,AttachmentTrait;
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function scopeMax($query,$max = 0)
    {
        return $query->where('max_amount','>',$max);
    }

    public function scopeActive($query,$active = 1)
    {
        return $query->where('active', $active);
    }

    public function scopeDefaultOrder($query,$order_by ="order_id",$order_type = "ASC")
    {
        return $query->orderBy($order_by,$order_type)->orderBy("created_at","DESC");
    }

    public function scopeFinish($query,$finish = 1)
    {
        return $query->where('finish', $finish);
    }

    public function scopeOfType($query, $type = 'client')
    {
        return $query->where('type', $type);
    }

    public function scopeOfTypeArray($query, $type)
    {
        return $query->whereIn('type', $type);
    }

    public function scopeOfStatusArray($query, $status)
    {
        return $query->whereIn('status', $status);
    }

    public function scopeOfNotTypeArray($query, $type)
    {
        return $query->whereNotIn('type', $type);
    }

    public function scopeOfNotStatusArray($query, $status)
    {
        return $query->whereNotIn('status', $status);
    }
    public function scopeAcceptOrder($query)
    {
        return $query->whereNotIn('status', $this->order_status_failed_array);
    }

    public function scopeFailedOrder($query)
    {
        return $query->whereIn('status', $this->order_status_failed_array);
    }

    public function scopeCurrentOrder($query)
    {
        return $query->whereNotIn('status', $this->order_status_finish_array);
    }

    public function scopeHistoryOrder($query)
    {
        return $query->whereIn('status', $this->order_status_finish_array);
    }

    public function scopeOfKeyArray($query, $array,$key = "type")
    {
        return $query->whereIn($key, $array);
    }

    public function scopeOfNotKeyArray($query, $array,$key = "type")
    {
        return $query->whereNotIn($key, $array);
    }

    public function scopeFeature($query, $feature = 1)
    {
        return $query->where('feature', $feature);
    }

    public function scopeOffer($query, $offer = 1)
    {
        return $query->where('offer', $offer);
    }

    public function scopeSale($query, $sale = 1)
    {
        return $query->where('sale', $sale);
    }

    public static function updateParentIDType($id, $parent_id,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->parent_id = $parent_id;
        return $model->save();
        }
    }

    public static function updateOrderIDType($id, $order_id,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->order_id = $order_id;
        return $model->save();
        }
    }

    public static function updateImageType($id, $image,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->image = $image;
        return $model->save();
        }
    }

    public static function updateUserIDType($id, $model_id,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->user_id = $model_id;
        return $model->save();
        }
    }

    public static function updateTimeType($id, $model_id,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->update_at = new Carbon();
        $model->update_by = $model_id;
        return $model->save();
        }
    }

    public static function updateLinkType($id, $link,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->link = $link;
        return $model->save();
        }
    }

    public static function updateActiveType($id, $active,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->active = $active;
        return $model->save();
        }
    }

    public static function updateReadType($id,$type = 'products') {
        $model = static::findOrFail($id);
        if ($model->type == $type) {
        $model->is_read = 1;
        return $model->save();
        }
    }

    public static function countChildType($parent_id,$type = 'products') {
        return static::where('parent_id', $parent_id)->where('type', $type)->where('active', 1)->count();
    }

    public static function countUnReadType($type = 'products') {
        return static::where('type', $type)->where('is_read', 0)->count();
    }

    public static function foundDataType($name,$column = 'name',$type = 'products'){
        $model = static::where($column, $name)->where('type', $type)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataActiveType($name,$column = 'name',$type = 'products'){
        $model = static::where($column, $name)->where('type', $type)->where('active', 1)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function updateImage($id, $image) {
        $model = static::findOrFail($id);
        $model->image = $image;
        return $model->save();
    }

    public static function updateParentID($id, $parent_id) {
        $model = static::findOrFail($id);
        $model->parent_id = $parent_id;
        return $model->save();
    }

    public static function updateOrderID($id, $order_id) {
        $model = static::findOrFail($id);
        $model->order_id = $order_id;
        return $model->save();
    }

    public static function updateUserID($id, $model_id) {
        $model = static::findOrFail($id);
        $model->user_id = $model_id;
        return $model->save();
    }

    public static function updateBy($id, $user_id) {
        $model = static::findOrFail($id);
        $model->update_at = new Carbon();
        $model->update_by = $user_id;
        return $model->save();
    }

    public static function updateAt($id) {
//        return static::where('id', $id)->update(['updated_at'=>new Carbon()]);
        $model = static::findOrFail($id);
        $model->updated_at = new Carbon();
        return $model->save();
    }

    public static function createAt($id) {
//        return static::where('id', $id)->update(['updated_at'=>new Carbon()]);
        $model = static::findOrFail($id);
        $model->created_at = new Carbon();
        return $model->save();
    }

    public static function updateLink($id, $link) {
        $model = static::findOrFail($id);
        $model->link = $link;
        return $model->save();
    }

    public static function updateActive($id, $active,$column = 'active') {
        $model = static::findOrFail($id);
        $model->$column = $active;
        return $model->save();
    }

    public static function updateCount($id,$column = 'view_count') {
        return static::where('id', $id)->increment($column);
    }

    public static function updateRead($id) {
        $model = static::findOrFail($id);
        $model->is_read = 1;
        return $model->save();
    }

    public static function updateReply($id) {
        $model = static::findOrFail($id);
        $model->is_reply  = 1;
        return $model->save();

    }

    public static function countUnRead() {
        return static::where('is_read', 0)->count();
    }

    public static function countUnReadAble($able_type = 'commentable_type',$type ="products") {
        return static::where($able_type, $type)->where('is_read', 0)->count();
    }

    public static function countUnReply() {
        return static::where('is_reply', 0)->count();
    }

    public static function countChild($parent_id) {
        return static::where('parent_id', $parent_id)->where('active', 1)->count();
    }

    public static function updateColumn($id, $column,$column_value) {
        $model = static::findOrFail($id);
        $model->$column = $column_value;
        return $model->save();
    }

    public static function getData($id,$column = 'name'){
        $model = static::where('id', $id)->first();
        if(isset($model)){
        return $model->$column;
        }
    }

    public static function getDataLocale($id,$column = 'name',$locale = "ar"){
        $model = static::where('id', $id)->first();
        if(isset($model)){
        return $model->$column[$locale];
        }
    }

    public function getDataID($id,$column = 'name'){
        $model = static::where('id', $id)->first();
        if(isset($model)){
        return $model->$column;
        }
    }

    public function parentCount($id) {
        return static::where('parent_id', $id)->count();
    }

//    public static function foundKey($name) {
//        $found = static::where('name', $name)->first();
//        if (isset($found)) {
//            return $found->id;
//        } else {
//            return 0;
//        }
//    }


    public static function foundData($name,$column = 'name'){
        $model = static::where($column, $name)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataLocale($name,$column = 'name',$locale = 'en'){
        $model = static::where($column, $name)->where('locale', $locale)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataTypeActive($name,$type = "products",$column = 'name'){
        $model = static::where($column, $name)->where('type', $type)->where('active', 1)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataTypeActiveLocale($name,$column = 'name',$type = "products",$locale = 'en'){
        $model = static::where($column, $name)->where('type', $type)->where('locale', $locale)->where('active', 1)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataActive($name,$column = 'name'){
        $model = static::where($column, $name)->where('active', 1)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundDataActiveLocale($name,$column = 'name',$locale = 'en'){
        $model = static::where($column, $name)->where('locale', $locale)->where('active', 1)->first();
        if(isset($model)){
        return $model->id;
        }else{
         return 0;
        }
    }

    public static function foundLink($link,$type = "products") {
        $link_found  = static::where('link', $link)->where('type', $type)->first();
        if (isset($link_found)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function foundLinkLocale($link,$type = "products",$locale = "ar") {
        $link_found  = static::where('link', $link)->where('type', $type)->where('locale', $locale)->first();
        if (isset($link_found)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function foundLinkNotID($id,$link,$type = "products") {
        $link_found  = static::where('id','<>', $id)->where('link', $link)->where('type', $type)->first();
        if (isset($link_found)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function foundLinkLocaleNotID($id,$link,$type = "products",$locale = "ar") {
        $link_found  = static::where('id','<>', $id)->where('link', $link)->where('type', $type)->where('locale', $locale)->first();
        if (isset($link_found)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function dateBetween($start,$end){
        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$start, $end])->get();
        return $count[0]->count;
    }

    public static function lastMonth(){
        $month = Carbon::now()->subMonth()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetween($month, $date);
    }

    public static function lastWeek(){
        $week = Carbon::now()->subWeek()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetween($week, $date);
    }

    public static function lastDay(){
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetween($day, $date);
    }

    public static function dateBetweenType($start,$end,$type = 'products'){
        $count = static::select(DB::raw('COUNT(*)  count'))->where('type',$type)->whereBetween(DB::raw('created_at'), [$start, $end])->get();
        return $count[0]->count;
    }

    public static function lastMonthType($type = 'products'){
        $month = Carbon::now()->subMonth()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetweenType($month, $date,$type);
    }

    public static function lastWeekType($type = 'products'){
        $week = Carbon::now()->subWeek()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetweenType($week, $date,$type);
    }

    public static function lastDayType($type = 'products'){
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        return self::dateBetweenType($day, $date,$type);
    }
}

//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
