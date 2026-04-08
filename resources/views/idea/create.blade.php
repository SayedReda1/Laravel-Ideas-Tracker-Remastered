<x-layout>
    <div class="max-w-2xl mx-auto my-10 space-y-5">
        <a href="{{ route('idea.index') }}" class="flex items-center gap-x-2 text-sm text-muted-foreground">
            <x-icons.arrow-back />
            Back to Ideas
        </a>

        <h2 class="text-3xl font-bold">Create Idea</h2>

        <form x-data="{
                    status: 'pending',
                    newLink: '',
                    links: [],
                    newStep: '',
                    steps: [],
                }"
              action="{{ route('idea.store') }}"
              method="POST"
              enctype="multipart/form-data"
        >
            @csrf

            <div class="space-y-6">
                <x-form.field
                    label="Title"
                    name="title"
                    type="text"
                    placeholder="Enter your idea title"
                    autofocus
                    data-test="idea-title"
                />

                <div>
                    <label for="status" class="label">Status</label>
                    <div class="flex gap-x-3 mt-2">
                        @foreach(\App\IdeaStatus::cases() as $status)
                            <button
                                type="button"
                                @click="status=@js($status->value)"
                                class="btn rounded-lg flex-1"
                                :class="{'btn-outlined': status !== @js($status->value)}"
                                data-test="idea-status-{{ $status->value }}"
                            >
                                {{ $status->label() }}
                            </button>
                        @endforeach
                        <x-form.error name="status" />
                    </div>
                    <input type="hidden" name="status" :value="status" />
                </div>

                <x-form.field
                    label="Description"
                    name="description"
                    type="textarea"
                    placeholder="Describe your idea..."
                    data-test="idea-description"
                />

                <div class="space-y-2">
                    <label for="image" class="label">Featured Image</label>
                    <input type="file" name="image" id="image" accept="image/*" data-test="idea-image" />
                    <x-form.error name="image" />
                </div>

                <div>
                    <fieldset class="space-y-3">
                        <legend class="label">Steps</legend>
                        <template x-for="(step,index) in steps">
                            <div class="flex gap-x-4 items-center">
                                <input type="text" name="steps[]" x-model="step" class="flex-1 input">
                                <button
                                    type="button"
                                    @click="steps.splice(index,1)"
                                    class="text-3xl rotate-45 form-muted-icon text-red-400"
                                >+</button>
                            </div>
                        </template>
                        <div class="flex gap-x-4 items-center">
                            <input
                                type="text"
                                name="step"
                                id="step"
                                class="input focus:outline-none focus:ring-2 focus:ring-primary flex-1"
                                placeholder="What needs to be done?"
                                x-model="newStep"
                                data-test="step-field"
                            >
                            <button
                                type="button"
                                class="text-3xl form-muted-icon"
                                @click="steps.push(newStep.trim()); newStep = ''"
                                :disabled="newStep.trim().length === 0"
                                data-test="add-new-step-button"
                            >+</button>
                        </div>
                    </fieldset>
                </div>

                <div>
                    <fieldset class="space-y-3">
                        <legend class="label">Links</legend>
                        <template x-for="(link,index) in links">
                            <div class="flex gap-x-4 items-center">
                                <input type="text" name="links[]" x-model="link" class="flex-1 input">
                                <button
                                    type="button"
                                    @click="links.splice(index,1)"
                                    class="text-3xl rotate-45 form-muted-icon text-red-400"
                                >+</button>
                            </div>
                        </template>
                        <div class="flex gap-x-4 items-center">
                            <input
                                type="text"
                                name="link"
                                id="link"
                                class="input focus:outline-none focus:ring-2 focus:ring-primary flex-1"
                                placeholder="https://example.com"
                                x-model="newLink"
                                data-test="link-field"
                            >
                            <button
                                type="button"
                                class="text-3xl form-muted-icon"
                                @click="links.push(newLink.trim()); newLink = ''"
                                :disabled="newLink.trim().length === 0"
                                data-test="add-new-link-button"
                            >+</button>
                        </div>
                    </fieldset>
                </div>

                <div class="flex justify-end items-center gap-x-5 mt-4">
                    <button type="button" @click="show=false">Cancel</button>
                    <button type="submit" class="btn">Create</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
