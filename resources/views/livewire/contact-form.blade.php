<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h1 class="mb-3">Contact Us</h1>
            <form wire:submit.prevent="submit">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="your-name" class="form-label">Your Name</label>
                        <input wire:model.live="name" type="text" class="form-control" id="your-name" name="your-name" required>

                        <div class="text-danger">@error('name') {{ $message }} @enderror</div>

                    </div>
                    <div class="col-md-6">
                        <label for="your-email" class="form-label">Your Email</label>
                        <input wire:model.live="email" type="email" class="form-control" id="your-email" name="your-email" required>

                        <div class="text-danger">@error('email') {{ $message }} @enderror</div>

                    </div>
                    <div class="col-md-12">
                        <label for="your-subject" class="form-label">Your Phone</label>
                        <input wire:model.live="phone" type="text" class="form-control" id="your-subject" name="phone">
                        <div class="text-danger">@error('phone') {{ $message }} @enderror</div>

                    </div>
                    <br>
                    <div class="col-12">
                        <label for="your-message" class="form-label">Your Message</label>
                        <textarea wire:model.live="message" class="form-control" id="your-message" name="your-message" rows="5" required></textarea>

                        <div class="text-danger">@error('message') {{ $message }} @enderror</div>


                    </div>
                    <div class="col-12">
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-dark w-100 fw-bold" >Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

