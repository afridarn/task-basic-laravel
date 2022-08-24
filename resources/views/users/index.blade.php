<x-app-layout2 title="Users">
    <div class="container">
        <x-card title='Users'>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Twitter</th>
                </thead>
                <tbody>
                    <?php foreach ($users as $key=> $user): ?>
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['twitter'] }}</td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout2>
