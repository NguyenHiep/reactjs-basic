import React from 'react';
import './index.css';
import './project01.css';
import Header from '../include/header';
import SidebarHome from '../include/sidebarhome';
import Footer from '../include/footer';
import SliderHome from '../include/slider';
import ItemsNew from './items_new';
import ItemsHot from './items_hot';

class Home extends React.Component {
	
	// State create
  constructor(props){
		super(props);
		this.state = {
      items_new : [
        {
          id: 1,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg',
          title: 'Quỷ sai',
          title_en: 'aaaa aaa',
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 2,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/hiep-khach-giang-ho-58cb4d0f38423-thumbnail-176x264.jpg',
          title: 'Hiệp khách giang hồ',
          title_en: ' 열혈강호 yeolhyulgangho; 热血江湖; 熱血江湖; 열강 ; Sabre & Dragon; Sabre et Dragon; Ruler of the Land',
          url: 'http://truyentranh.net/hiep-khach-giang-ho',
          type: 'Manhwa, Action',
          author: 'Yang Jae Hyun',
          description: 'Câu chuyện xoay quanh nhân vật chính là Hàn Bảo Quân, một kẻ không có võ công nhưng ...',
          status: true
        },
      ],
      items_hot : [
        {
          id: 1,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg',
          title: 'Quỷ sai',
          title_en: 'aaaa aaa',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 2,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/hiep-khach-giang-ho-58cb4d0f38423-thumbnail-176x264.jpg',
          title: 'Hiệp khách giang hồ',
          title_en: ' 열혈강호 yeolhyulgangho; 热血江湖; 熱血江湖; 열강 ; Sabre & Dragon; Sabre et Dragon; Ruler of the Land',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
          ],
          url: 'http://truyentranh.net/hiep-khach-giang-ho',
          type: 'Manhwa, Action',
          author: 'Yang Jae Hyun',
          description: 'Câu chuyện xoay quanh nhân vật chính là Hàn Bảo Quân, một kẻ không có võ công nhưng ...',
          status: true
        },
        {
          id: 3,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/A-Story-About-Treating-a-Female-Knight-Who-Has-Never-Been-Treated-as-a-Woman-5ae705d4d28b3-thumbnail-176x264.jpg',
          title: 'A Story About Treating a Female ...',
          title_en: 'A Story About Treating a Female ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 4,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/Shinigamihime-no-Saikon-Baraen-no-Tokei-Koushaku-5ae70337dfa57-thumbnail-176x264.jpg',
          title: 'Shinigamihime no Saikon - Baraen ...',
          title_en: 'Shinigamihime no Saikon - Baraen ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 5,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg',
          title: 'Quỷ sai',
          title_en: 'aaaa aaa',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 6,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/hiep-khach-giang-ho-58cb4d0f38423-thumbnail-176x264.jpg',
          title: 'Hiệp khách giang hồ',
          title_en: ' 열혈강호 yeolhyulgangho; 热血江湖; 熱血江湖; 열강 ; Sabre & Dragon; Sabre et Dragon; Ruler of the Land',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 545',
              url: 'http://truyentranh.net/hiep-khach-giang-ho/Chap-545'
            },
    
          ],
          url: 'http://truyentranh.net/hiep-khach-giang-ho',
          type: 'Manhwa, Action',
          author: 'Yang Jae Hyun',
          description: 'Câu chuyện xoay quanh nhân vật chính là Hàn Bảo Quân, một kẻ không có võ công nhưng ...',
          status: true
        },
        {
          id: 7,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/A-Story-About-Treating-a-Female-Knight-Who-Has-Never-Been-Treated-as-a-Woman-5ae705d4d28b3-thumbnail-176x264.jpg',
          title: 'A Story About Treating a Female ...',
          title_en: 'A Story About Treating a Female ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 8,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/Shinigamihime-no-Saikon-Baraen-no-Tokei-Koushaku-5ae70337dfa57-thumbnail-176x264.jpg',
          title: 'Shinigamihime no Saikon - Baraen ...',
          title_en: 'Shinigamihime no Saikon - Baraen ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 9,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg',
          title: 'Quỷ sai',
          title_en: 'aaaa aaa',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 10,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/hiep-khach-giang-ho-58cb4d0f38423-thumbnail-176x264.jpg',
          title: 'Hiệp khách giang hồ',
          title_en: ' 열혈강호 yeolhyulgangho; 热血江湖; 熱血江湖; 열강 ; Sabre & Dragon; Sabre et Dragon; Ruler of the Land',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 545',
              url: 'http://truyentranh.net/hiep-khach-giang-ho/Chap-545'
            },
    
          ],
          url: 'http://truyentranh.net/hiep-khach-giang-ho',
          type: 'Manhwa, Action',
          author: 'Yang Jae Hyun',
          description: 'Câu chuyện xoay quanh nhân vật chính là Hàn Bảo Quân, một kẻ không có võ công nhưng ...',
          status: true
        },
        {
          id: 11,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/A-Story-About-Treating-a-Female-Knight-Who-Has-Never-Been-Treated-as-a-Woman-5ae705d4d28b3-thumbnail-176x264.jpg',
          title: 'A Story About Treating a Female ...',
          title_en: 'A Story About Treating a Female ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 12,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/Shinigamihime-no-Saikon-Baraen-no-Tokei-Koushaku-5ae70337dfa57-thumbnail-176x264.jpg',
          title: 'Shinigamihime no Saikon - Baraen ...',
          title_en: 'Shinigamihime no Saikon - Baraen ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 13,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg',
          title: 'Quỷ sai',
          title_en: 'aaaa aaa',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 14,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/hiep-khach-giang-ho-58cb4d0f38423-thumbnail-176x264.jpg',
          title: 'Hiệp khách giang hồ',
          title_en: ' 열혈강호 yeolhyulgangho; 热血江湖; 熱血江湖; 열강 ; Sabre & Dragon; Sabre et Dragon; Ruler of the Land',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 545',
              url: 'http://truyentranh.net/hiep-khach-giang-ho/Chap-545'
            },
    
          ],
          url: 'http://truyentranh.net/hiep-khach-giang-ho',
          type: 'Manhwa, Action',
          author: 'Yang Jae Hyun',
          description: 'Câu chuyện xoay quanh nhân vật chính là Hàn Bảo Quân, một kẻ không có võ công nhưng ...',
          status: true
        },
        {
          id: 15,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/A-Story-About-Treating-a-Female-Knight-Who-Has-Never-Been-Treated-as-a-Woman-5ae705d4d28b3-thumbnail-176x264.jpg',
          title: 'A Story About Treating a Female ...',
          title_en: 'A Story About Treating a Female ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
        {
          id: 16,
          image: 'http://cdn.truyentranh.net/upload/image/comic/20180430/Shinigamihime-no-Saikon-Baraen-no-Tokei-Koushaku-5ae70337dfa57-thumbnail-176x264.jpg',
          title: 'Shinigamihime no Saikon - Baraen ...',
          title_en: 'Shinigamihime no Saikon - Baraen ...',
          list_chapter: [
            {
              id: 1,
              title: 'Chap 016',
              url: 'http://truyentranh.net/Quy-Sai/Chap-016'
            },
            {
              id: 2,
              title: 'Chap 017',
              url: 'http://truyentranh.net/Quy-Sai/Chap-017'
            },
            {
              id: 3,
              title: 'Chap 018',
              url: 'http://truyentranh.net/Quy-Sai/Chap-018'
            },
            {
              id: 4,
              title: 'Chap 019',
              url: 'http://truyentranh.net/Quy-Sai/Chap-019'
            },
            {
              id: 5,
              title: 'Chap 020',
              url: 'http://truyentranh.net/Quy-Sai/Chap-020'
            },
            {
              id: 6,
              title: 'Chap 021',
              url: 'http://truyentranh.net/Quy-Sai/Chap-021'
            },
            {
              id: 7,
              title: 'Chap 022',
              url: 'http://truyentranh.net/Quy-Sai/Chap-022'
            },
            {
              id: 8,
              title: 'Chap 023',
              url: 'http://truyentranh.net/Quy-Sai/Chap-023'
            },
    
          ],
          url: 'http://truyentranh.net/Quy-Sai',
          type: 'Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy ',
          author: 'Akita Hika,Kotodera Amane,Kaburagi Haruka',
          description: 'Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chế',
          status: true
        },
      ]
    }

    this.onAddProduct = this.onAddProduct.bind(this);
	}

	onAddProduct()
	{
		console.log(this.refs.product_name.value);
	}

	render() {
		let elements_new = this.state.items_new.map( ( items, index) => {
		  let result = '';
		  if(items.status)
      {
        result = <ItemsNew
          key					 ={ items.id}
          image				 ={ items.image}
          title				 ={ items.title}
          title_en		 ={ items.title_en}
          url					 ={ items.url}
          type				 ={ items.type}
          author			 ={ items.author}
          description	 ={ items.description}
        >{ items.title}</ItemsNew>
      }
			return  result;
		});
		let elements     = this.state.items_hot.map( (items, index) => {
      let result = '';
		  if(items.status)
      {
        result = <ItemsHot
          key					 ={ items.id}
          image				 ={ items.image}
          title				 ={ items.title}
          title_en		 ={ items.title_en}
          list_chapter ={ items.list_chapter}
          url					 ={ items.url}
          type				 ={ items.type}
          author			 ={ items.author}
          description	 ={ items.description}
        >{ items.title}</ItemsHot>
      }
			return result;
		});
		return (
      <article>
        <SliderHome/>
        <main id="content">
          <div className="container">
            <div className="row">
              <div className="col-xs-12 col-lg-8">
                <h3 className="title-body">Truyện mới đăng</h3>
                <div className="row">
									{ elements_new}
                </div> {/* end truyện mới đăng */}
                <h3 className="title-body">Truyện mới nhất</h3>
                <div className="row">
									{ elements}
                </div>
              </div>
              <div className="col-xs-12 col-lg-4">
                <div className="row">
                  <div className="col-md-12">
                    <div className="history-read">
                      <p className="save-manga">
                        <a href="http://truyentranh.net/dang-nhap.html?ref=http%3A%2F%2Ftruyentranh.net%2F">
                          <img src="http://cdn.truyentranh.net/frontend/images/clockfix.png" /> Xem lịch sử đọc truyện của bạn</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div className="row">
                  <SidebarHome/>
                </div>
              </div>
            </div>
          </div>
        </main>
      </article>
		);
	}
}
export default Home;

