<div class="flex mb-4">
    <div
        class="w-1/3 border-b-4 text-center pt-4 {{ request()->routeIs('payment.index') ? 'border-indigo-600' : '' }}">
        <a class="w-full text-indigo-600 text-lg font-semibold"
            href="{{ route('payment.index') }}">{{ strtoupper('Payments') }}</a>
    </div>
    <div
        class="w-1/3 border-b-4 text-center pt-4 {{ request()->routeIs('transaction.index') ? 'border-indigo-600' : '' }}">
        <a class="w-full text-indigo-600 text-lg font-semibold"
            href="{{ route('transaction.index') }}">{{ strtoupper('Students Account Status') }}</a>
    </div>
    <div
        class="w-1/3 border-b-4 text-center pt-4 {{ request()->routeIs('payment.history.index') ? 'border-indigo-600' : '' }}">
        <a class="w-full text-indigo-600 text-lg font-semibold"
            href="{{ route('payment.history.index') }}">{{ strtoupper('payment history') }}</a>
    </div>
</div>
