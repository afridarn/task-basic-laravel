<x-app-layout2 title='Login'>
    <div class="container">
        <h1 class="text-center mb-4">Login Here</h1>
    </div>
    <div class="container">
        <form>
            <x-form.type.input name="name" id="name" class="form-control" />
            <x-form.type.input name="password" id="password" class="form-control" />
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <x-form.type.button type="submit" class="btn-primary" value="Login"></x-form.type.button>
            </div>
        </form>
    </div>
</x-app-layout2>
