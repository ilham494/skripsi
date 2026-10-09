@php
    $lines = preg_split("/\r\n|\n|\r/", $logs ?? '');

    $entries = [];
    $current = null;

    foreach ($lines as $line) {

        if (preg_match(
            '/^\[([^\]]+)\]\s+(\w+)\.([A-Z]+):\s*(.*)$/',
            $line,
            $match
        )) {

            if ($current) {
                $entries[] = $current;
            }

            $current = [
                'datetime' => $match[1],
                'environment' => $match[2],
                'level' => strtoupper($match[3]),
                'message' => trim($match[4]),
                'details' => '',
            ];

        } else {

            if ($current && trim($line) !== '') {
                $current['details'] .= $line . "\n";
            }
        }
    }

    if ($current) {
        $entries[] = $current;
    }

    // Terbaru di atas
    $entries = array_reverse($entries);
@endphp


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Development Logs</title>


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        /* HEADER */

        .header {
            background: #111827;
            color: white;
            padding: 25px 28px;
            border-radius: 14px 14px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 23px;
        }

        .header p {
            margin: 7px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }


        /* TOOLBAR */

        .toolbar {
            background: white;
            padding: 15px;
            border: 1px solid #e5e7eb;
            border-top: none;

            display: flex;
            align-items: center;
            gap: 10px;

            flex-wrap: wrap;
        }

        .search {
            flex: 1;
            min-width: 220px;

            padding: 9px 12px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            outline: none;
            font-size: 13px;
        }

        .search:focus {
            border-color: #111827;
        }

        select {
            padding: 9px 12px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            background: white;

            font-size: 13px;

            cursor: pointer;
        }

        .refresh {
            padding: 9px 14px;

            background: #111827;
            color: white;

            border-radius: 7px;

            text-decoration: none;

            font-size: 13px;
        }

        .refresh:hover {
            background: #374151;
        }


        /* SUMMARY */

        .summary {
            background: white;

            padding: 12px 15px;

            border: 1px solid #e5e7eb;
            border-top: none;

            font-size: 12px;
            color: #6b7280;
        }


        /* LOG CARD */

        .log-list {
            margin-top: 18px;
        }

        .log-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            margin-bottom: 12px;

            overflow: hidden;

            transition: 0.15s;
        }

        .log-card:hover {
            border-color: #cbd5e1;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.04);
        }


        .log-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 15px;

            padding: 15px 18px;

            border-bottom: 1px solid #f3f4f6;
        }


        .log-title {
            display: flex;

            align-items: center;

            gap: 10px;

            min-width: 0;
        }


        .message {
            font-size: 14px;

            font-weight: 600;

            word-break: break-word;
        }


        .log-date {
            flex-shrink: 0;

            color: #9ca3af;

            font-size: 11px;
        }


        /* BADGES */

        .badge {
            padding: 4px 8px;

            border-radius: 999px;

            font-size: 10px;

            font-weight: bold;

            flex-shrink: 0;
        }

        .badge-info {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-error {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-debug {
            background: #e5e7eb;
            color: #374151;
        }


        /* BODY */

        .log-body {
            padding: 17px 18px;
        }


        .detail-row {
            display: flex;

            gap: 10px;

            margin-bottom: 8px;

            font-size: 13px;
        }

        .detail-label {
            width: 80px;

            color: #6b7280;
        }

        .detail-value {
            color: #111827;

            word-break: break-word;
        }


        /* OTP */

        .otp-box {
            margin-top: 15px;

            padding: 14px;

            background: #ecfdf5;

            border: 1px solid #a7f3d0;

            border-radius: 9px;

            text-align: center;
        }

        .otp-label {
            color: #047857;

            font-size: 10px;

            font-weight: bold;

            margin-bottom: 5px;
        }

        .otp {
            color: #065f46;

            font-size: 25px;

            font-weight: bold;

            letter-spacing: 5px;
        }


        /* STACK TRACE */

        details {
            margin-top: 10px;
        }

        details summary {
            cursor: pointer;

            color: #6b7280;

            font-size: 12px;
        }

        .details {
            margin-top: 8px;

            background: #f9fafb;

            padding: 12px;

            border-radius: 8px;

            font-family: Consolas, monospace;

            font-size: 11px;

            color: #6b7280;

            white-space: pre-wrap;

            word-break: break-word;

            max-height: 400px;

            overflow: auto;
        }


        /* EMPTY */

        .empty {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 50px;

            text-align: center;

            color: #9ca3af;

            display: none;
        }


        /* MOBILE */

        @media (max-width: 700px) {

            .container {
                margin: 15px auto;
                padding: 0 10px;
            }

            .log-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .log-date {
                order: -1;
            }

        }

    </style>

</head>


<body>


<div class="container">


    {{-- HEADER --}}

    <div class="header">

        <h1>
            Development Logs
        </h1>

        <p>
            System activity & application logs
        </p>

    </div>


    {{-- TOOLBAR --}}

    <div class="toolbar">


        <input
            type="text"
            id="search"
            class="search"
            placeholder="Cari email, OTP, user ID, pesan..."
        >


        <select id="levelFilter">

            <option value="ALL">
                Semua Level
            </option>

            <option value="INFO">
                INFO
            </option>

            <option value="NOTICE">
                NOTICE
            </option>

            <option value="WARNING">
                WARNING
            </option>

            <option value="ERROR">
                ERROR
            </option>

            <option value="CRITICAL">
                CRITICAL
            </option>

        </select>


        <select id="typeFilter">

            <option value="ALL">
                Semua Tipe
            </option>

            <option value="OTP">
                OTP
            </option>

            <option value="ERROR">
                Error
            </option>

            <option value="OTHER">
                Lainnya
            </option>

        </select>


        <select id="sort">

            <option value="newest">
                Terbaru
            </option>

            <option value="oldest">
                Terlama
            </option>

        </select>


        <a
            href="{{ url('/dev/mail-log') }}"
            class="refresh"
        >
            ↻ Refresh
        </a>


    </div>


    {{-- SUMMARY --}}

    <div class="summary">

        Menampilkan

        <strong id="visibleCount">
            {{ count($entries) }}
        </strong>

        dari

        <strong>
            {{ count($entries) }}
        </strong>

        log

    </div>


    {{-- LOG LIST --}}

    <div
        class="log-list"
        id="logList"
    >


        @foreach($entries as $index => $entry)

            @php

                $level = strtoupper($entry['level']);

                $message = $entry['message'];

                $details = $entry['details'];

                $searchText = strtolower(
                    $level . ' ' .
                    $message . ' ' .
                    $details
                );


                $badgeClass = match ($level) {

                    'ERROR',
                    'CRITICAL',
                    'ALERT',
                    'EMERGENCY'
                        => 'badge-error',

                    'WARNING'
                        => 'badge-warning',

                    'INFO',
                    'NOTICE'
                        => 'badge-info',

                    default
                        => 'badge-debug',

                };


                $isOtp = str_contains(
                    strtolower($searchText),
                    'otp'
                );


                $isError = in_array(
                    $level,
                    [
                        'ERROR',
                        'CRITICAL',
                        'ALERT',
                        'EMERGENCY'
                    ]
                );


                $type = $isOtp
                    ? 'OTP'
                    : ($isError ? 'ERROR' : 'OTHER');


                preg_match(
                    '/"email"\s*:\s*"([^"]+)"/',
                    $details,
                    $emailMatch
                );

                preg_match(
                    '/"otp"\s*:\s*"([^"]+)"/',
                    $details,
                    $otpMatch
                );

                preg_match(
                    '/"user_id"\s*:\s*(\d+)/',
                    $details,
                    $userMatch
                );

            @endphp


            <div
                class="log-card"
                data-level="{{ $level }}"
                data-type="{{ $type }}"
                data-search="{{ $searchText }}"
                data-index="{{ $index }}"
            >


                {{-- HEADER --}}

                <div class="log-header">


                    <div class="log-title">


                        <span class="badge {{ $badgeClass }}">
                            {{ $level }}
                        </span>


                        <span class="message">
                            {{ $message }}
                        </span>


                    </div>


                    <div class="log-date">

                        {{ $entry['datetime'] }}

                    </div>


                </div>


                {{-- BODY --}}

                <div class="log-body">


                    @if($isOtp)


                        @if(isset($userMatch[1]))

                            <div class="detail-row">

                                <div class="detail-label">
                                    User ID
                                </div>

                                <div class="detail-value">
                                    {{ $userMatch[1] }}
                                </div>

                            </div>

                        @endif


                        @if(isset($emailMatch[1]))

                            <div class="detail-row">

                                <div class="detail-label">
                                    Email
                                </div>

                                <div class="detail-value">
                                    {{ $emailMatch[1] }}
                                </div>

                            </div>

                        @endif


                        @if(isset($otpMatch[1]))

                            <div class="otp-box">

                                <div class="otp-label">
                                    OTP
                                </div>

                                <div class="otp">
                                    {{ $otpMatch[1] }}
                                </div>

                            </div>

                        @endif


                    @endif


                    @if(trim($details) !== '')

                        <details>

                            <summary>
                                Lihat detail / stack trace
                            </summary>


                            <div class="details">
                                {{ $details }}
                            </div>

                        </details>

                    @endif


                </div>


            </div>

        @endforeach


    </div>


    <div
        class="empty"
        id="empty"
    >

        Tidak ada log yang sesuai dengan filter.

    </div>


</div>


<script>

    const searchInput =
        document.getElementById('search');

    const levelFilter =
        document.getElementById('levelFilter');

    const typeFilter =
        document.getElementById('typeFilter');

    const sortSelect =
        document.getElementById('sort');

    const logList =
        document.getElementById('logList');

    const empty =
        document.getElementById('empty');

    const visibleCount =
        document.getElementById('visibleCount');


    function filterLogs() {

        const search =
            searchInput.value
                .toLowerCase()
                .trim();

        const level =
            levelFilter.value;

        const type =
            typeFilter.value;


        const cards =
            Array.from(
                logList.querySelectorAll('.log-card')
            );


        let visible = 0;


        cards.forEach(card => {

            const cardLevel =
                card.dataset.level;

            const cardType =
                card.dataset.type;

            const cardSearch =
                card.dataset.search;


            const matchesSearch =
                !search ||
                cardSearch.includes(search);


            const matchesLevel =
                level === 'ALL' ||
                cardLevel === level;


            const matchesType =
                type === 'ALL' ||
                cardType === type;


            const show =
                matchesSearch &&
                matchesLevel &&
                matchesType;


            card.style.display =
                show ? '' : 'none';


            if (show) {
                visible++;
            }

        });


        visibleCount.textContent =
            visible;


        empty.style.display =
            visible === 0
                ? 'block'
                : 'none';

    }


    function sortLogs() {

        const cards =
            Array.from(
                logList.querySelectorAll('.log-card')
            );


        const direction =
            sortSelect.value;


        cards.sort((a, b) => {

            const aIndex =
                parseInt(a.dataset.index);

            const bIndex =
                parseInt(b.dataset.index);


            if (direction === 'newest') {

                return aIndex - bIndex;

            } else {

                return bIndex - aIndex;

            }

        });


        cards.forEach(card => {

            logList.appendChild(card);

        });

    }


    searchInput.addEventListener(
        'input',
        filterLogs
    );


    levelFilter.addEventListener(
        'change',
        filterLogs
    );


    typeFilter.addEventListener(
        'change',
        filterLogs
    );


    sortSelect.addEventListener(
        'change',
        sortLogs
    );


    // Default
    filterLogs();
    sortLogs();

</script>


</body>

</html>
