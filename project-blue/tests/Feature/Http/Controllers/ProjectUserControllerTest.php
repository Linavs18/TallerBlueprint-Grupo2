<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjectUserController
 */
final class ProjectUserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $projectUsers = ProjectUser::factory()->count(3)->create();

        $response = $this->get(route('project-users.index'));

        $response->assertOk();
        $response->assertViewIs('projectUser.index');
        $response->assertViewHas('projectUsers');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectUserController::class,
            'store',
            \App\Http\Requests\ProjectUserStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $role = fake()->word();

        $response = $this->post(route('project-users.store'), [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'role' => $role,
        ]);

        $projectUsers = ProjectUser::query()
            ->where('project_id', $project->id)
            ->where('user_id', $user->id)
            ->where('role', $role)
            ->get();
        $this->assertCount(1, $projectUsers);
        $projectUser = $projectUsers->first();

        $response->assertRedirect(route('projectUsers.index'));
        $response->assertSessionHas('projectUser.id', $projectUser->id);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectUserController::class,
            'update',
            \App\Http\Requests\ProjectUserUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $projectUser = ProjectUser::factory()->create();
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $role = fake()->word();

        $response = $this->put(route('project-users.update', $projectUser), [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'role' => $role,
        ]);

        $projectUser->refresh();

        $response->assertRedirect(route('projectUsers.index'));
        $response->assertSessionHas('projectUser.id', $projectUser->id);

        $this->assertEquals($project->id, $projectUser->project_id);
        $this->assertEquals($user->id, $projectUser->user_id);
        $this->assertEquals($role, $projectUser->role);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $projectUser = ProjectUser::factory()->create();

        $response = $this->delete(route('project-users.destroy', $projectUser));

        $response->assertRedirect(route('projectUsers.index'));

        $this->assertModelMissing($projectUser);
    }
}
