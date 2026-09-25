<?php

namespace Database\Seeders;

use App\Models\StudyItem;
use Illuminate\Database\Seeder;

class StudyItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['ネットワークの基礎', 'ネットワークと構成要素', 'ネットワークと構成要素について学習します。', 'まだ分からない', '未学習', null],
            ['ネットワークの基礎', 'ネットワーク機器と役割', 'ネットワーク機器と役割について学習します。', 'まだ分からない', '未学習', null],
        
            ['Cisco機器の基本知識', 'Cisco機器の基本', 'Cisco機器の基本について学習します。', 'まだ分からない', '未学習', null],
        
            ['Layer1：物理層', '物理層', '物理層について学習します。', 'まだ分からない', '未学習', null],
            ['Layer1：物理層', 'Ethernet(イーサネット)', 'Ethernet(イーサネット)について学習します。', 'まだ分からない', '未学習', null],
        
            ['Layer2：データリンク層', 'L2スイッチの役割', 'L2スイッチの役割について学習します。', 'まだ分からない', '未学習', null],
            ['Layer2：データリンク層', 'VLAN(Virtual LAN)', 'VLAN(Virtual LAN)について学習します。', 'まだ分からない', '未学習', null],
        
            ['Layer3：ネットワーク層', 'IPv4', 'IPv4について学習します。', 'まだ分からない', '未学習', null],
            ['Layer3：ネットワーク層', 'IPアドレス', 'IPアドレスについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer3：ネットワーク層', 'ルーターの役割', 'ルーターの役割について学習します。', 'まだ分からない', '未学習', null],
            ['Layer3：ネットワーク層', 'OSPF', 'OSPFについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer3：ネットワーク層', 'ICMP', 'ICMPについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer3：ネットワーク層', 'ARP', 'ARPについて学習します。', 'まだ分からない', '未学習', null],
        
            ['Layer4：トランスポート層', 'トランスポート層の役割', 'トランスポート層の役割について学習します。', 'まだ分からない', '未学習', null],
            ['Layer4：トランスポート層', 'TCP', 'TCPについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer4：トランスポート層', 'UDP', 'UDPについて学習します。', 'まだ分からない', '未学習', null],
        
            ['Layer7：アプリケーション層', 'アプリケーション層の役割', 'アプリケーション層の役割について学習します。', 'まだ分からない', '未学習', null],
            ['Layer7：アプリケーション層', 'HTTP', 'HTTPについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer7：アプリケーション層', 'DNS', 'DNSについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer7：アプリケーション層', 'DHCP', 'DHCPについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer7：アプリケーション層', 'FTP/TFTP', 'FTP/TFTPについて学習します。', 'まだ分からない', '未学習', null],
            ['Layer7：アプリケーション層', 'TELNET/SSH', 'TELNET/SSHについて学習します。', 'まだ分からない', '未学習', null],
        
            ['ネットワークの技術', 'ACL', 'ACLについて学習します。', 'まだ分からない', '未学習', null],
            ['ネットワークの技術', 'NAT', 'NATについて学習します。', 'まだ分からない', '未学習', null],
        ];

        foreach ($rows as [$category, $title, $content, $understanding, $status, $date]) {
            StudyItem::create([
                'category'        => $category,
                'title'           => $title,
                'content'         => $content,
                'understanding'   => $understanding,
                'status'          => $status,
                'last_studied_at' => $date,
            ]);
        }
    }
}
