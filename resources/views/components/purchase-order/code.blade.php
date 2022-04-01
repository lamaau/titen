<div
    x-data="purchaseOrder"
    class="flex items-center mt-2 relative"
>
    <div
        x-ref="container"
        class="form-control rounded-r-none flex justify-between @error('purchaseOrderModelProperty.code') border-red-500 @enderror"
    >
        <p>
            TG.<span x-text="text(counter)"></span>.<span x-text="text(day)"></span>/<span
                x-text="romanize(month)"></span>/<span x-text="year"></span>
        </p>
        <div class="flex flex-col">
            <button
                type="button"
                @click="counter++"
            >
                <x-heroicon-s-chevron-up class="w-3 h-3" />
            </button>
            <button
                type="button"
                @click="() => { if (counter > 1) counter-- }"
            >
                <x-heroicon-s-chevron-down class="w-3 h-3" />
            </button>
        </div>
    </div>
    <div
        x-ref="flatpickr"
        class="form-control w-12 focus:ring-0 rounded-l-none @error('purchaseOrderModelProperty.code') border-red-500 border-l-0 @enderror"
    >
        <label
            for="input"
            class="text-gray-400"
        >
            <x-feathericon-calendar />
        </label>
        <input
            id="input"
            data-input
            style="display: none!important;"
        />
    </div>

</div>

<x-form.error name="purchaseOrderModelProperty.code" />

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('purchaseOrder', () => ({
            day: @entangle('codeModelProperty.day'),
            month: @entangle('codeModelProperty.month'),
            year: @entangle('codeModelProperty.year'),
            counter: @entangle('codeModelProperty.counter'),
            init() {
                let _ = this;
                flatpickr(this.$refs.flatpickr, {
                    wrap: true,
                    dateFormat: "d-m-Y",
                    disableMobile: "true",
                    positionElement: _.$refs.container,
                    onChange: function(selected, dateStr, instance) {
                        let dateObject = new Date(selected);

                        let fullYear = dateObject.getFullYear().toString();
                        let resultYear = fullYear.substr(fullYear.length - 2);

                        let day = dateObject.getDate(),
                            month = dateObject.getMonth() + 1;

                        _.day = day;
                        _.month = month;
                        _.year = resultYear;

                        _.$wire.fullDate(`${fullYear}-${month}-${day}`);
                    },
                });
            },
            text(val) {
                return ('0' + val).slice(-2);
            }
        }))
    })
</script>
