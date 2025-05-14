<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Current Website</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($admins as $key => $admin)
            <tr>
                <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                <td>{{ $admin->email }}</td>

                <td>
                    @if($admin->updated_at < now()->subHours(9) || !$admin->site)
                        <span class="text-danger">Not managing any site</span>
                    @else
                        {{ ucfirst($admin->site?->name) }}
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
