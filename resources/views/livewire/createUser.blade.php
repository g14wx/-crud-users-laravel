<div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
    <form>

        <div class="form-group mb-6">
            <label for="nameinput" class="form-label inline-block mb-2 text-gray-700">Name</label>
            <input type="text" wire:model="name" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="textinput"
                   aria-describedby="emailHelp" placeholder="enter name">
            <small id="emailHelp" class="block mt-1 text-xs text-gray-600">Inset a unique name</small>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-6">
            <label for="ageinput" class="form-label inline-block mb-2 text-gray-700">age</label>
            <input type="number" wire:model="age" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="ageexample"
                   aria-describedby="emailHelp" placeholder="Enter age">
            <small id="emailHelp" class="block mt-1 text-xs text-gray-600">Inset your age</small>
            @error('age')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-6">
            <label for="emailInput" class="form-label inline-block mb-2 text-gray-700">Email address</label>
            <input type="email" wire:model="email" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1"
                   aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="block mt-1 text-xs text-gray-600">Insert your email</small>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-6">
            <label for="passwordInput" class="form-label inline-block mb-2 text-gray-700">Password</label>
            <input type="password" wire:model="password" class="form-control block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputPassword1"
                   placeholder="Password">
            <small id="emailHelp" class="block mt-1 text-xs text-gray-600">Insert your password</small>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <table>
            <tr>
                <td>
                    <button type="submit" wire:click.prevent="storeUser()" class="flex px-4 py-2 bg-gray-100 text-gray-900 cursor-pointer hover:bg-blue-200 focus:text-blue-700 focus:bg-blue-200 focus:outline-none focus:ring-blue-600"> Save user
                    </button>
                </td>
                <td>
                    <button type="submit" wire:click.prevent="cancelUser()" class="flex px-4 py-2 bg-gray-100 text-gray-900 cursor-pointer hover:bg-blue-200 focus:text-blue-700 focus:bg-blue-200 focus:outline-none focus:ring-blue-600">Cancel
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

