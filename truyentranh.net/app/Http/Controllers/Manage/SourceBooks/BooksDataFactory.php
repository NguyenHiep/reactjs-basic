<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/19/2018
 * Time: 9:50 AM
 */

namespace App\Http\Controllers\Manage\SourceBooks;

class BooksDataFactory extends AbstractFactory
{

    /***
     * @param $source
     * @param $url
     * @return ComicvnNet|HamTruyenCom|NetTruyenCom|TruyenSieuHayCom|TruyenTranhNet|null
     */
    public function getSource($source, $url)
    {
        // TODO: Implement getSource() method.
        switch ($source) {
            case BooksDataInterface::TRUYENTRANH_NET;
                return new TruyenTranhNet($url);
                break;
            case BooksDataInterface::HAMTRUYEN_COM;
                return new HamTruyenCom($url);
                break;
            case BooksDataInterface::TRUYENSIEUHAY_COM;
                return new TruyenSieuHayCom($url);
                break;
            case BooksDataInterface::COMMICVN_NET;
                return new ComicvnNet($url);
                break;
            case BooksDataInterface::NETTRUYEN_COM;
                return new NetTruyenCom($url);
                break;
            default:
                return null;
        }
    }
}