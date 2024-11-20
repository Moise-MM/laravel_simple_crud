<div class="row">
    <div class="col-6">
        <x-input name="first_name" label="Firstname" :value="$customer->first_name ?? ''"/>
    </div>
    <div class="col-6">
        <x-input name="last_name" label="Lastname"  :value="$customer->last_name ?? ''"/>
    </div>
    <div class="col-6">
        <x-input name="email" label="Email" type="email"  :value="$customer->email ?? ''"/>
    </div>
    <div class="col-6">
        <x-input name="phone" label="Phone"  :value="$customer->phone ?? ''"/>
    </div>
    <div class="col-12">
        <x-input name="image" label="image" type="file"/>
    </div>
</div>