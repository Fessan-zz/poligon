<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 *
 * @package \App\Repositories
 */
class BlogCategoryRepository extends CoreRepository {

	/**
	 * @return string
	 */

	protected function getModelClass() {
		return Model::class;
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

	/**
	 *Получить список категорий для вывода в выпадающем списке
	 *
	 * @return Collection
	 */

	public function getForComboBox() {


		$columns = implode(', ', ['id', 'CONCAT (id,". ",title) AS id_title',]);
		/*
				$result[] = $this->startConditions()->all();

				$result[] = $this
					->startConditions()
					->select('blog_categories.*',
						\DB::raw('CONCAT (id,". ",title) AS id_title'))
					->toBase()
					->get();
		*/
		$result = $this->startConditions()->selectRaw($columns)->toBase()->get();

		//	dd($result);

		return $result;
	}

	/**
	 *Получить категории для вывода пагинации
	 *
	 * @param int|null $perPage
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator;
	 */

	public function getAllWithPaginate($perPage = null) {

		$columns = ['id', 'title', 'parent_id'];
		$result = $this->startConditions()->select($columns)->paginate($perPage);

		return $result;
	}
}