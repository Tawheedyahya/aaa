<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Projects | AAA LED</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-wrap">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">AAA LED Admin</div>
            <nav class="admin-sidebar__nav">
                <a href="/admin/projects" class="admin-sidebar__link admin-sidebar__link--active">Projects</a>
                <a href="/" class="admin-sidebar__link" target="_blank">View Site</a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1 class="admin-header__title">Projects</h1>
                <a href="/admin/projects/create" class="admin-btn admin-btn--primary">+ New Project</a>
            </header>

            @if (isset($_GET['deleted']))
                <div class="admin-alert admin-alert--success">Project deleted successfully.</div>
            @endif

            @if (count($projects) === 0)
                <div class="admin-empty">
                    <p>No projects yet. <a href="/admin/projects/create">Create your first project</a>.</p>
                </div>
            @else
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Ad</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>#{{ $project['id'] }}</td>
                                    <td>
                                        <div class="admin-thumbs">
                                            @foreach (array_slice($project['images'], 0, 3) as $img)
                                                <img src="{{ asset('assets/projects/' . $img) }}" alt="" class="admin-thumb">
                                            @endforeach
                                            @if (count($project['images']) > 3)
                                                <span class="admin-thumb-more">+{{ count($project['images']) - 3 }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="admin-table__title">{{ $project['title'] }}</td>
                                    <td><span class="admin-badge">{{ $project['category'] }}</span></td>
                                    <td>{{ $project['location'] }}</td>
                                    <td>{{ $project['date'] }}</td>
                                    <td>{{ $project['ad'] ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div class="admin-action-group">
                                            <a href="/admin/projects/edit/{{ $project['id'] }}" class="admin-btn admin-btn--sm">Edit</a>
                                            <form method="POST" action="/admin/projects/delete/{{ $project['id'] }}" onsubmit="return confirm('Delete this project?')" style="display:inline">
                                                <button type="submit" class="admin-btn admin-btn--sm admin-btn--danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
    </div>
</body>
</html>
