<? namespace Todo\Repositories;

interface TodoRepositoryInterface
{
	public function getAll();

	public function store();

	public function destroy($id);
}