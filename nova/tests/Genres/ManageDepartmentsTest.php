<?php namespace Tests\Genres;

use Nova\Genres\Department;
use Tests\DatabaseTestCase;

class ManageDepartmentsTest extends DatabaseTestCase
{
	protected $department;

	public function setUp()
	{
		parent::setUp();

		$this->department = create('Nova\Genres\Department');
	}

	/** @test **/
	public function unauthorized_users_cannot_manage_departments()
	{
		$this->withExceptionHandling();

		$this->get(route('departments.index'))->assertRedirect(route('sign-in'));
		$this->get(route('departments.create'))->assertRedirect(route('sign-in'));
		$this->post(route('departments.store'))->assertRedirect(route('sign-in'));
		$this->get(route('departments.edit', $this->department))->assertRedirect(route('sign-in'));
		$this->patch(route('departments.update', $this->department))->assertRedirect(route('sign-in'));
		$this->delete(route('departments.destroy', $this->department))->assertRedirect(route('sign-in'));
		$this->get(route('departments.reorder'))->assertRedirect(route('sign-in'));
		$this->patch('/admin/departments/reorder')->assertRedirect(route('sign-in'));

		$this->signIn();

		$this->get(route('departments.index'))->assertStatus(403);
		$this->get(route('departments.create'))->assertStatus(403);
		$this->post(route('departments.store'))->assertStatus(403);
		$this->get(route('departments.edit', $this->department))->assertStatus(403);
		$this->patch(route('departments.update', $this->department))->assertStatus(403);
		$this->delete(route('departments.destroy', $this->department))->assertStatus(403);
		$this->get(route('departments.reorder'))->assertStatus(403);
		$this->patch('/admin/departments/reorder')->assertStatus(403);
	}

	/** @test **/
	public function a_department_can_be_created()
	{
		$admin = $this->createAdmin();

		$this->signIn($admin);

		$department = make('Nova\Genres\Department');

		$this->post(route('departments.store'), $department->toArray());

		$this->assertDatabaseHas('departments', [
			'name' => $department->name,
			'description' => $department->description
		]);
	}

	/** @test **/
	public function positions_can_be_created_when_creating_a_department()
	{
		$admin = $this->createAdmin();

		$this->signIn($admin);

		$department = make('Nova\Genres\Department');
		$position = make('Nova\Genres\Position');

		$data = $department->toArray();
		$data['positions'][] = $position->toArray();

		$this->post(route('departments.store'), $data);

		$createdDepartment = Department::get()->last();

		$this->assertDatabaseHas('positions', [
			'name' => $position->name,
			'department_id' => $createdDepartment->id
		]);
	}

	/** @test **/
	public function a_department_can_be_updated()
	{
		$admin = $this->createAdmin();

		$this->signIn($admin);

		$this->patch(
			route('departments.update', [$this->department]),
			['name' => "New Name"]
		);

		$this->assertDatabaseHas('departments', ['name' => "New Name"]);
	}

	/** @test **/
	public function a_department_can_be_reordered()
	{
		$admin = $this->createAdmin();

		$this->signIn($admin);

		$dept1 = create('Nova\Genres\Department', ['order' => 0]);
		$dept2 = create('Nova\Genres\Department', ['order' => 1]);

		$response = $this->patch('/admin/departments/reorder', ['depts' => [$dept2->id, $dept1->id]]);

		$response->assertStatus(200);

		$this->assertDatabaseHas('departments', ['id' => $dept2->id, 'order' => 0]);
		$this->assertDatabaseHas('departments', ['id' => $dept1->id, 'order' => 1]);
	}

	/** @test **/
	public function a_department_can_be_deleted()
	{
		$admin = $this->createAdmin();

		$this->signIn($admin);

		$this->delete(route('departments.destroy', [$this->department]));

		$this->assertDatabaseMissing('departments', ['name' => $this->department->name]);
	}

	/** @test **/
	public function has_no_errors()
	{
		$admin = $this->createAdmin();
		$this->signIn($admin);
		
		$this->get(route('departments.index'))->assertSuccessful();
		$this->get(route('departments.create'))->assertSuccessful();
		$this->get(route('departments.edit', $this->department))->assertSuccessful();
		$this->get(route('departments.reorder'))->assertSuccessful();
	}
}
