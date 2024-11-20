<div class="container">
    <h1>Список сообщений</h1>

        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Ваше имя" required>
            <textarea name="text" rows="3" placeholder="Введите сообщение" required></textarea>
            <button type="submit">Отправить</button>
        </form>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Текст</th>
                <th>Дата/Время</th>
                <th>Автор</th>
                <th>Отметить как оскорбительное</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->text }}</td>
                <td>{{ $message->created_at }}</td>
                <td>{{$message->name}}</td>
                <td>
                    <form action="{{ route('messages.mark-as-offensive', $message->id) }}" method="POST">
                        @csrf
                        <button type="submit">Отметить как оскорбительное</button>
                    </form>
                </td>
                <td>
                    @if($message->is_offensive)
                        <span style="background-color: #dc3545;">Оскорбительное</span>
                    @else
                        <span>Безопасное</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$messages->links() }}
</div>