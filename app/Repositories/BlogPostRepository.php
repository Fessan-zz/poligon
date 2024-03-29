<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository{
	/**
	 * @return string
	 */
	protected function getModelClass() {
		// TODO: Implement getModelClass() method.
		return Model::class;
	}

	/**
	 * Получение списка статей для вывода в админке
	 *
	 * @return LengthAwarePaginator
	 */
	public function getAllWithPaginate(){

		$columns = [
			'id',
			'title',
			'slug',
			'is_published',
			'published_at',
			'user_id',
			'category_id',
		];

		$result = $this->startConditions()
			->select($columns)
			->orderBy('id', 'DESC')
			//>with(['category', 'user'])
			->wiht(
				[
					// Можно так
					'category' => function ($query){
					$query->select(['id', 'title']);
					},
					// или так
					'user:id,name',
				]
			)
			->paginate(25);

		return $result;
	}
	/**
	 * Получить модель для редактиврования в админке
	 *
	 * @param int $id
	 *
	 * @return Model
	 */

	public function getEdit($id) {
		return $this->startConditions()->find($id);
	}
}