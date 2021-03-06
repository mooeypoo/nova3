<?php namespace Tests\Characters;

use Tests\DatabaseTestCase;
use Nova\Characters\Character;

class CharacterTest extends DatabaseTestCase
{
	protected $character;

	public function setUp()
	{
		parent::setUp();

		$this->character = create('Nova\Characters\Character');
	}

	/** @test **/
	public function it_has_positions()
	{
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection',
			$this->character->positions
		);
	}

	/** @test **/
	public function it_can_have_a_rank()
	{
		$this->assertInstanceOf('Nova\Genres\Rank', $this->character->rank);
	}

	/** @test **/
	public function it_can_have_a_user()
	{
		$this->assertInstanceOf('Nova\Users\User', $this->character->user);
	}

	/** @test **/
	public function it_knows_if_its_a_primary_character()
	{
		$user = $this->character->user;

		$character = create('Nova\Characters\Character', ['user_id' => $user->id]);

		$this->assertFalse($character->isPrimaryCharacter());

		$character->setAsPrimaryCharacter();

		$this->assertTrue($character->isPrimaryCharacter());
	}

	/** @test **/
	public function it_can_make_itself_a_primary_character()
	{
		$user = $this->character->user;

		$character = create('Nova\Characters\Character', ['user_id' => $user->id]);

		$character->setAsPrimaryCharacter();

		$this->assertTrue($character->isPrimaryCharacter());
	}

	/** @test **/
	public function it_makes_itself_the_primary_character_when_its_the_first_character_assigned_to_a_user()
	{
		$user = create('Nova\Users\User');
		$character = create(Character::class);

		$character->assignToUser($user);

		$this->assertEquals($user->fresh()->primaryCharacter->id, $character->id);
	}

	/** @test **/
	public function is_has_media()
	{
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection',
			$this->character->media
		);
	}

	/** @test **/
	public function it_can_assign_itself_to_a_user()
	{
		$user = create('Nova\Users\User');
		$character = create(Character::class, ['user_id' => null]);

		$character->assignToUser($user);

		$this->assertEquals($user->id, $character->user_id);
	}

	/** @test **/
	public function it_can_unassign_itself_from_a_user()
	{
		$user = create('Nova\Users\User');
		$character = create(Character::class, ['user_id' => $user->id]);

		$character->unassignFromUser($user);

		$this->assertEquals(null, $character->user_id);
	}
}
