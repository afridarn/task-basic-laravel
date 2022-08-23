<x-app-layout2 title='Login'>
    <div class="container">
        <h1 class="text-center mb-4">Login Here</h1>
    </div>
    <div class="container">
        {{-- <x-form></x-form> --}}
        <form>
            <x-form.type.input name="name" id="name" class="form-control" />
            <x-form.type.input name="password" id="password" class="form-control" />
            <x-form.type.button type="submit" class="btn btn-primary">
            </x-form.type.button>
        </form>
    </div>
</x-app-layout2>