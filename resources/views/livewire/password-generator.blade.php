<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="generatePassword">
                        @csrf
                        <h2>Personalice su contraseña</h2>
                        <div class="form-group">
                            <label for="length" class="mb-0">Longitud de la contraseña</label>
                            <div class="input-group">
                                <input wire:model="length" name="length" class="lp-custom-range__number" step="1" id="length" type="number" min="1" max="50">
                                <input wire:model="length" type="range" class="lp-custom-form-range" id="passwordLength" name="passwordLength" min="1" max="50" step="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input wire:model="useUppercase" type="checkbox" id="useUppercase" name="useUppercase" class="form-check-input" checked>
                                <label class="form-check-label">Mayúsculas</label>
                            </div>

                            <div class="form-check">
                                <input wire:model="useLowercase" type="checkbox" id="useLowercase" name="useLowercase" class="form-check-input" checked>
                                <label class="form-check-label">Minúsculas</label>
                            </div>

                            <div class="form-check">
                                <input wire:model="useNumbers" type="checkbox" id="useNumbers" name="useNumbers" class="form-check-input" checked>
                                <label class="form-check-label">Números</label>
                            </div>

                            <div class="form-check">
                                <input wire:model="useSymbols" type="checkbox" id="useSymbols" name="useSymbols" class="form-check-input" checked>
                                <label class="form-check-label">Símbolos</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <input wire:model="password" id="password" type="text" class="form-control">
                            <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copyPasswordToClipboard()"><i class="bi bi-copy"></i></button>
                            <button wire:click="generatePassword" class="btn btn-outline-secondary"><i class="bi bi-arrow-repeat"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyPasswordToClipboard() {
        // Selecciona el campo de contraseña
        var passwordField = document.getElementById('password');

        // Selecciona el contenido del campo de contraseña
        passwordField.select();
        passwordField.setSelectionRange(0, 99999); // Para dispositivos móviles

        // Copia el contenido al portapapeles
        document.execCommand('copy');
    }
</script>