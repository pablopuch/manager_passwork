<div class="container mb-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Personalice su contraseña</h4>
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
                            <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copy_clipboard()">
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
    function copy_clipboard() {
        var campoContraseña = document.getElementById('password'); // Obtenemos el campo de texto de la contraseña

        if (navigator.clipboard && navigator.clipboard.writeText) {
            // Si el navegador soporta la API de Clipboard (API moderna), usamos esta función para copiar
            navigator.clipboard.writeText(campoContraseña.value).then(function() {
                // Opcionalmente, podrías mostrar un mensaje de éxito aquí
            }).catch(function(err) {
                console.error('Error al copiar la contraseña: ', err); // Si hay algún error, se muestra en la consola
            });
        } else {
            // Método de respaldo para navegadores más antiguos que no soportan la API Clipboard
            campoContraseña.select(); // Seleccionamos el texto del campo
            campoContraseña.setSelectionRange(0, 99999); // Para dispositivos móviles, aseguramos la selección completa
            document.execCommand('copy'); // Usamos el comando `execCommand` para copiar el texto
        }
    }
</script>