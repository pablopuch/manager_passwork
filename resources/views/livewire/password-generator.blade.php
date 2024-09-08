<div class="container mb-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Personalice su Contraseña</h4>
                </div>
                <div class="card-body">
                    <form wire:submit="generatePassword">
                        @csrf
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <input wire:model.live="length" name="length" type="number" id="length" class="form-control me-2" step="1" min="6" max="30" style="width: 80px;">
                                <input wire:model.live="length" type="range" class="form-range flex-grow-1" id="passwordLength" name="passwordLength" min="6" max="30" step="1">
                            </div>
                        </div>

                        <fieldset class="mb-4">
                            <div class="row">
                                <!-- Columna 1 -->
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input wire:model.live="useUppercase" type="checkbox" id="useUppercase" name="useUppercase" class="form-check-input" checked>
                                        <label class="form-check-label" for="useUppercase">Mayúsculas</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input wire:model.live="useLowercase" type="checkbox" id="useLowercase" name="useLowercase" class="form-check-input" checked>
                                        <label class="form-check-label" for="useLowercase">Minúsculas</label>
                                    </div>
                                </div>

                                <!-- Columna 2 -->
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input wire:model.live="useNumbers" type="checkbox" id="useNumbers" name="useNumbers" class="form-check-input" checked>
                                        <label class="form-check-label" for="useNumbers">Números</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input wire:model.live="useSymbols" type="checkbox" id="useSymbols" name="useSymbols" class="form-check-input" checked>
                                        <label class="form-check-label" for="useSymbols">Símbolos</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        <div class="input-group">
                            <input wire:model.live="password" id="password" type="text" class="form-control" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copyPasswordToClipboard()">
                                <i class="bi bi-clipboard"></i> Copiar
                            </button>
                            <button wire:click="generatePassword" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-repeat"></i> Generar
                            </button>
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